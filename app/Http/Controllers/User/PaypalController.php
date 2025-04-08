<?php

namespace App\Http\Controllers\User;

use App\CentralLogics\Cart;
use App\CentralLogics\Helpers;
use App\CentralLogics\OrderLogic;
use App\CentralLogics\TransactionLogic;
use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\TemporaryOrder;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaypalController extends Controller
{   
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    public function checkoutStore(Request $request)
    {    
     
        //Remove temporary order by changing the status
        TemporaryOrder::where('user_id',auth::user()->id)->where('status','pending')->update(['status'=>'override']);


         $gs = GeneralSetting::findOrFail(1);
         
         $user=Auth::user();
         $cartItems = Cart::getCartItems();
         if(!$cartItems){
           return redirect()->back()->with('error','Empty Cart');
         }
        $cartTotal = Cart::calculateCartTotal($cartItems,'paypal');
        $totalprice = Helpers::getPrice($cartTotal['total']);
        $coupon_code=Session::get('coupon_code');
        $coupon_own_type=Session::get('coupon_own_type');
        $couponPercentage = Session::get('coupon_percentage');

        $partnerOrderNo='paypal' . time() . mt_rand(1000, 9999);
        $authToken = hash('sha256', Str::random(32));


        try{

            $tempOrder=OrderLogic::createTemporaryOrder($user->id,$partnerOrderNo,$cartItems,$cartTotal,'pending','PayPal',$authToken,$coupon_code,$coupon_own_type,$couponPercentage);
            \Log::info('PayPal payment initiation.', ['user_id' => $user->id, 'amount' => $totalprice]);

            $provider = new PayPalClient();
            $token = $provider->getAccessToken();
            $provider->setAccessToken($token);  



            $data = [
                "intent" => "CAPTURE",
                "application_context" => [
                    "brand_name" => $gs->name,
                    "locale" => "en-US",
                    "payment_method" => [
                        "payer_selected" => "PAYPAL",
                        "payee_preferred" => "IMMEDIATE_PAYMENT_REQUIRED"
                    ],
                    "return_url" => route('user.paypal.checkout.success'),
                    "cancel_url" => route('user.paypal.checkout.cancel')
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => $gs->currency_code,
                            "value" => $totalprice
                        ],
                        "description" => "Purchase of Cart items by " . auth()->user()->name . " - " . auth()->user()->affiliate_code,
                        'custom_id' => http_build_query([
                            'user_id' => $user->id,
                            'totalprice'=> $totalprice,
                            'partnerOrderNo' => $tempOrder->partner_order_no,
                            // 'authToken' => $tempOrder->auth_token
                        ]),
                    ]
                ]
            ];

            $order = $provider->createOrder($data);   
            return redirect($order['links'][1]['href']);

        } catch (\Exception $exception) {
           \Log::error('Order/Transaction creation failed.', ['user_id' => $user->id, 'error' => $exception->getMessage()]);
            return back()->with('error', $exception->getMessage());
        }

    }


    public function success(Request $request)
    {   

        // Init PayPal
        $provider = new PayPalClient();
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

           try {

                // Handle the return logic here
                \Log::info('Received Paypal Success Request:', [
                    'request_data' => $request->all(),
                    'auth_id' => auth()->user()->id
                ]);

                // Get PaymentOrder using our transaction ID
                $orderResponse = $provider->capturePaymentOrder($request->token);
                $txn_id = $orderResponse['purchase_units'][0]['payments']['captures'][0]['id'];

                // Parse the custom data parameters
                parse_str($orderResponse['purchase_units'][0]['payments']['captures'][0]['custom_id'] ?? null, $data);

                if ($orderResponse['status'] && $orderResponse['status'] === "COMPLETED") {
                    $payment_status='completed';
                    if($data){
                        $tempOrder=TemporaryOrder::where('partner_order_no',$data['partnerOrderNo'])->where('status','pending')->firstOrFail();

                           // Decode the cart items and cart total, since they were stored as JSON
                        $cartItems = json_decode($tempOrder->cart_items, true);
                        $cartTotal = json_decode($tempOrder->cart_total, true);

                        $cartTotal['total'] = $data['totalprice'];

                        $createOrder = OrderLogic::createOrder(
                            $tempOrder->user_id, 
                            $cartItems, 
                            $cartTotal, 
                            $payment_status='completed', 
                            $tempOrder->payment_method, 
                            $tempOrder->coupon_code, 
                            $tempOrder->coupon_own_type, 
                            $tempOrder->coupon_percentage
                        );

                        $order= $createOrder; 
                        $createtransaction=TransactionLogic::createTransaction($order->id,$order->user_id,$order->payment_gateway, $data['totalprice'],$order->checkout_fee,'checkout',$txn_id); 

                        $tempOrder->status='completed';
                        $tempOrder->payment_status='completed';
                        $tempOrder->update(); 
                        
                        $mailer = new GeniusMailer();
                        $mailer->sendOrderConfirmation($order);

                        //clear cart
                        Cart::clearCart();
                        return redirect()->route('user.dashboard')->with('success', 'Your order has been successfully placed.');
                    }else{
                        // $tempOrder->status='failed';
                        // $tempOrder->update(); 
                        // Handle the return logic here
                       \Log::info('Paypal Transaction Failed User '. auth()->user()->id);
                        return redirect()->back()->with('error','Transaction verification failed.');
                    }
                    
                 
                }
            }catch(\Exception $e){
                
                \Log::error('Paypal Transaction Failed for User ' . auth()->user()->id . '. Error: ' . $e->getMessage() );
                return redirect()->route('user.checkout')->with('error', $e->getMessage());
            }

    }

    public function cancelPaypal($value='')
    {
       return redirect()->route('user.checkout')->with('erorr',"Payment Cancelled");
    }



}
