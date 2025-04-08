<?php

namespace App\Http\Controllers\User;

use App\CentralLogics\Cart;
use App\CentralLogics\Helpers;
use App\CentralLogics\OrderLogic;
use App\CentralLogics\TransactionLogic;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\TemporaryOrder;
use Auth;
use App\Models\QuizCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;
use Stripe\Exception\CardException;
use App\Classes\GeniusMailer;
use Stripe\StripeClient;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
class StripeController extends Controller
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
         $paymentMethod=$request->payment_method;
         $user=Auth::user();
         $cartItems = Cart::getCartItems();
         if(!$cartItems){
           return redirect()->back()->with('error','Empty Cart');
         }
         $cartTotal = Cart::calculateCartTotal($cartItems);
         $totalprice = Helpers::getPrice($cartTotal['total']);

        $coupon_code=Session::get('coupon_code');
        $coupon_own_type=Session::get('coupon_own_type');
        $couponPercentage = Session::get('coupon_percentage');


        $partnerOrderNo='stripe' . time() . mt_rand(1000, 9999);
        $authToken = hash('sha256', Str::random(32));
                
        $tempOrder=OrderLogic::createTemporaryOrder($user->id,$partnerOrderNo,$cartItems,$cartTotal,'pending','Stripe',$authToken,$coupon_code,$coupon_own_type,$couponPercentage);

        // Generate a secure token
        $securityToken = Str::random(100);
        session(['stripeSecurityToken' => $securityToken]);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $checkout_session = $stripe->checkout->sessions->create([
          'metadata' => ['security_token' => $securityToken ,'temp_order_id'=>$tempOrder->id],
          'payment_method_types' => ['card'],
          'line_items' => [[
            'price_data' => [
              'currency' => $gs->currency_code,
              'product_data' => [
                'name' => 'Items In Cart',
              ],
              'unit_amount' => $totalprice * 100,
            ],
            'quantity' => 1,
          ]],
          'mode' => 'payment',
          'success_url' => route('user.stripe.checkout.success'). '?session_id={CHECKOUT_SESSION_ID}',
          'cancel_url' => route('user.stripe.checkout.cancel'),
        ]);
        return redirect($checkout_session->url);
    }

    public function success(Request $request)
    {     
        $user=Auth::user();
        Stripe::setApiKey(env('STRIPE_SECRET'));  
        $session_id = $request->query('session_id');
        if (!$session_id) {
            return redirect()->route('user.stripe.checkout.cancel')->with('failure', 'Payment session not found.');
        }
        $session = StripeSession::retrieve($session_id);
        $payment_intent_id = $session->payment_intent;

        $paymentIntent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        $sessionToken = $session->metadata['security_token'] ?? null;
        $temp_order_id = $session->metadata['temp_order_id'] ?? null;
        $storedToken = Session::get('stripeSecurityToken');
            try{
                if ($sessionToken === $storedToken && $paymentIntent->status === 'succeeded') 
                {
                    
                    Session::forget('stripeSecurityToken');
                    $tempOrder = TemporaryOrder::where([
                                    ['id', '=', $temp_order_id],
                                    ['user_id', '=', $user->id ],
                                    ['status', '=', 'pending'],
                                ])->firstOrFail();

                    $payment_status='completed';
                     // \Log::info('Stripe payment successful.', ['user_id' => $user->id, 'transaction_id' => $charge->id]);

                    $txn_id= $paymentIntent->id;

                    $cartItems = json_decode($tempOrder->cart_items, true);
                    $cartTotal = json_decode($tempOrder->cart_total, true);
                    $createOrder = OrderLogic::createOrder(
                        $tempOrder->user_id, 
                        $cartItems, 
                        $cartTotal, 
                        $payment_status, 
                        $tempOrder->payment_method, 
                        $tempOrder->coupon_code, 
                        $tempOrder->coupon_own_type, 
                        $tempOrder->coupon_percentage
                    );
                    
                    $order= $createOrder; 
                    $createtransaction=TransactionLogic::createTransaction($order->id,$order->user_id,$order->payment_gateway, $order->pay_amount,$order->checkout_fee,'checkout',$txn_id); 

                    $tempOrder->status='completed';
                    $tempOrder->payment_status='completed';
                    $tempOrder->update(); 

                    $mailer = new GeniusMailer();
                    $mailer->sendOrderConfirmation($order);
                    
                    
                    //clear cart
                    //Cart::clearCart();   

                }else{
                    \Log::error('Stripe payment failed.', ['user_id' => $user->id]);
                    return redirect()->route('user.dashboard')->with('error','Something went wrong');
                    //$payment_status='pending';
                } 

                
                // if (is_array($cartItems) && !empty($cartItems)) {
                //     $firstCartItem = reset($cartItems); // Get the first element
                //     if ($firstCartItem['item_type'] === 'quizcatalog') {
                //         $quizbankmanagementt = QuizCatalog::find($firstCartItem['item_id']);
                //         if ($quizbankmanagementt) {
                //             //clear cart
                //             Cart::clearCart();
                //             return redirect()->route('user.quiz.test.show',[$quizbankmanagementt->slug])->with('success', 'Your order has been successfully placed. Please activate the quiz to continue.');
                //         }
                //     }
                // }
                //clear cart
                Cart::clearCart();

                return redirect()->route('user.dashboard')->with('success', 'Your order has been successfully placed.');
                    
            } catch (\Exception $exception) {
               \Log::error('Order/Transaction creation failed.', ['user_id' => $user->id, 'error' => $exception->getMessage()]);
                return redirect()->route('user.dashboard')->with('error', $exception->getMessage());
            }

    }

    public function cancel()
    {
        // Implement your cancellation scenario
          return redirect()->route('user.dashboard')->with('error','Something went wrong');
    }

}
