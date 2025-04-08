<?php

namespace App\CentralLogics;

use App\Models\Coupon;
use App\Models\SubPlan;
use App\Models\GeneralSetting;
use Auth;
use Session;

class Cart
{
    /**
     * Add an item (subscription plan) to the cart.
     */
    public static function addCartItem(array $cartData)
    {
        $cartItems = Session::get('cart', []);
        $key = self::generateCartItemKey($cartData['item_type'], $cartData['item_id']);

        // // Only one subscription plan allowed in the cart.
        // foreach ($cartItems as $item) {
        //     if ($cartData['item_type'] === 'subscription_plan' && $item['item_type'] === 'subscription_plan') {
        //         return ['success' => false, 'message' => 'Subscription plan already in cart'];
        //     }
        // }

        // if (isset($cartItems[$key])) {
        //     return ['success' => false, 'message' => 'Item already in cart'];
        // }

        $cartItems[$key] = [
            'item_type' => $cartData['item_type'],
            'item_id'   => $cartData['item_id'],
            'quantity'  => 1,
        ];

        Session::put('cart', $cartItems);
        return ['success' => true, 'message' => 'Item added successfully'];
    }

    /**
     * Remove an item from the cart.
     */
    public static function removeCartItem(string $itemType, int $itemId)
    {
        $cartItems = Session::get('cart', []);
        $key = self::generateCartItemKey($itemType, $itemId);
        if (isset($cartItems[$key])) {
            unset($cartItems[$key]);
            if (empty($cartItems)) {
                self::clearCart();
            } else {
                Session::put('cart', $cartItems);
            }
            return ['success' => true, 'message' => 'Item removed'];
        } else {
            return ['success' => false, 'message' => 'Item not found in cart'];
        }
    }

    /**
     * Retrieve all items in the cart.
     */
    public static function getCartItems()
    {
        return Session::get('cart');
    }

    /**
     * Clear the cart and remove any coupon data.
     */
    public static function clearCart()
    {
        Session::forget('cart');
        self::removeCoupon();
    }

    /**
     * Remove coupon data from the session.
     */
    public static function removeCoupon()
    {
        Session::forget('coupon_code');
        Session::forget('coupon_percentage');
    }

    /**
     * Generate a unique key for a cart item.
     */
    public static function generateCartItemKey(string $itemType, int $itemId)
    {
        return $itemType . ':' . $itemId;
    }

    /**
     * Validate a subscription plan.
     */
    public static function validateItem(string $itemType, int $itemId)
    {
        if ($itemType === 'subscription_plan') {
            return SubPlan::where('id', $itemId)->active()->first();
        }
        return null;
    }

    /**
     * Get details for a subscription plan.
     */
    public static function getItemDetails(string $itemType, int $itemId)
    {
        if ($itemType === 'subscription_plan') {
            $item = SubPlan::where('id', $itemId)->active()->first();
            if ($item) {
                return [
                    'name'    => $item->name,
                    'details' => $item->details,
                    'price'   => $item->price,
                    'photo'   => isset($item->photo)
                        ? Helpers::image($item->photo, 'subplan/')
                        : Helpers::image('def.png', 'images/'),
                ];
            }
        }
        return null;
    }

    /**
     * Add a coupon to the session.
     */
    public static function addCoupon($coupon_code)
    {  
        $coupon_code = strtoupper($coupon_code);
        $gs = \App\Models\GeneralSetting::find(1);
        $user = Auth::user();
        $couponExists = Coupon::active()->where('coupon_code', $coupon_code)->first();

        // Disallow coupon for Basic Membership (id==1)
        $cartItems = Session::get('cart', []);
        foreach ($cartItems as $item) {
            if ($item['item_type'] === 'subscription_plan' && $item['item_id'] == 1) {
                self::removeCoupon();
                return ['status' => 'error', 'message' => "Coupon can't be applied to Basic Membership."];
            }
        }
        
        if ($couponExists) {
            $couponPercentage = $couponExists->discount;
            $today = date('Y-m-d');
            if ($couponExists->max_coupon_usage > 0 && $couponExists->usage_count >= $couponExists->max_coupon_usage) {
                self::removeCoupon();
                return ['status' => 'error', 'message' => 'Coupon maximum usage limit exceeded.'];
            }
            if (!empty($couponExists->start_date) && $today < $couponExists->start_date) {
                self::removeCoupon();
                return ['status' => 'error', 'message' => 'Coupon is not valid at the moment.'];
            }
            if (!empty($couponExists->end_date) && $today > $couponExists->end_date) {
                self::removeCoupon();
                return ['status' => 'error', 'message' => 'Coupon has expired.'];
            }
            Session::put('coupon_code', $coupon_code);
            Session::put('coupon_percentage', $couponPercentage);
            return ['status' => 'success', 'message' => 'Coupon applied successfully.'];
        } else {
            self::removeCoupon();
            return ['status' => 'error', 'message' => 'Coupon does not exist.'];
        }
    }

    /**
     * Combined function to calculate the cart total.
     *
     * It computes:
     * - Subtotal from cart items.
     * - Coupon discount.
     * - Checkout fee (tax).
     * Returns a breakdown array.
     */
    public static function calculateCartTotal($cartItems, $payment_method = 'stripe')
    {
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $itemDetails = self::getItemDetails($item['item_type'], $item['item_id']);
            $price = $itemDetails['price'];
            $subtotal += $price * $item['quantity'];
        }
        $couponCode = Session::get('coupon_code');
        $couponPercentage = Session::get('coupon_percentage') ?? 0;
        $discount = ($couponCode && $couponPercentage > 0) ? $subtotal * ($couponPercentage / 100) : 0;
        $tax = self::calculateCheckoutFee($subtotal, $payment_method);
        $total = $subtotal + $tax - $discount;
        return [
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax'      => $tax,
            'total'    => $total,
        ];
    }

    /**
     * Calculate the checkout fee based on the payment method.
     */
    public static function calculateCheckoutFee($price, $method = 'stripe')
    {
        if ($method === 'paypal') {
            $flat_fee = 0.39;
            $percentage_fee = 3.49;
        } else {
            $flat_fee = 0.30;
            $percentage_fee = 2.9;
        }
        $fee = ($price * ($percentage_fee / 100)) + $flat_fee;
        return Helpers::getPrice($fee, 1);
    }
}
