<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CentralLogics\ProductLogic;
use App\CentralLogics\Helpers;
use App\CentralLogics\OrderLogic;
use App\CentralLogics\TransactionLogic;
use Auth;
class StripeController extends Controller
{   
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    public function processPayment(Request $request)
    {   
        $user=Auth::user();
        $cartValidate = ProductLogic::cartValidate($request->payment_gateway_name);
        if (is_array($cartValidate)) {
            $initialprice = $cartValidate['initialprice'];
            $checkoutfee = $cartValidate['checkoutfee'];
            $totalprice = $cartValidate['totalprice'];
            $product = $cartValidate['product'];
            $quantity = $cartValidate['quantity'];

            if(!$request->payment_method){
               // $intent = auth()->user()->createSetupIntent();
                // if user has already saved card
                if($user->hasStripeId()) {
                    $paymentMethod = $user->defaultPaymentMethod()->id;
                } else {
                    $paymentMethod = null;
                }
               return view('front.paymentgateways.stripe', compact('request','initialprice','product','totalprice','checkoutfee','paymentMethod'));
            }else{
                 $paymentMethod=$request->payment_method;
                 $savecard = $request->input('save_card_details');
                    try{
                        if($savecard){
                            $user->createOrGetStripeCustomer();
                            $user->updateDefaultPaymentMethod($paymentMethod);
                        }
                        $metadata = [
                            'product_name' => $product->game?$product->game->name:'',
                            'product_id' => $product->id,
                            'quantity' => $quantity
                        ];
                        $charge = $user->charge($totalprice * 100, $paymentMethod, [
                            'metadata' => $metadata
                        ]);

                        if($charge->status=='succeeded'){
                             $payment_status='completed';
                        }else{
                            return back()->with('error','Something went wrong');
                            //$payment_status='pending';
                        }        
                        $txn_id= $charge->id;
                        $createOrder=OrderLogic::createOrder($request, $totalprice, $checkoutfee, $product, $quantity,$payment_status);
                        $order= $createOrder; 
                        $createtransaction=TransactionLogic::createTransaction($order->id,$order->user_id,$order->payment_gateway, $order->pay_amount,$order->checkout_fee,'checkout',$txn_id);

                        return redirect()->route('user.order.purchased.show',$order->order_number)->with('success','Order placed SuccessFully');
                            
                    } catch (\Exception $exception) {
                        return back()->with('error', $exception->getMessage());
                    }
                   
            }
            
        }
        else{
            return $cartValidate;
        }

        
    }
}
