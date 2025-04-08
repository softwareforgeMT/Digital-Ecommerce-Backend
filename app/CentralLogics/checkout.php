<?php

namespace App\CentralLogics;

use Carbon\Carbon;
use App\Models\Coupon;

class Checkout
{
    /**
     * Validate the coupon code.
     *
     * @param string $couponCode
     * @return array ['valid' => bool, 'discount' => int, 'message' => string]
     */
    public static function validateCoupon(string $couponCode): array
    {
        $coupon = Coupon::where('coupon_code', strtoupper($couponCode))->first();
        if (!$coupon) {
            return ['valid' => false, 'discount' => 0, 'message' => 'Coupon code is invalid.'];
        }

        $now = Carbon::now();
        if ($coupon->start_date && $now->lt(Carbon::parse($coupon->start_date))) {
            return ['valid' => false, 'discount' => 0, 'message' => 'Coupon is not yet active.'];
        }
        if ($coupon->end_date && $now->gt(Carbon::parse($coupon->end_date))) {
            return ['valid' => false, 'discount' => 0, 'message' => 'Coupon has expired.'];
        }
        if ($coupon->max_usage_count != 0 && $coupon->usage_count >= $coupon->max_usage_count) {
            return ['valid' => false, 'discount' => 0, 'message' => 'Coupon usage limit reached.'];
        }

        return ['valid' => true, 'discount' => $coupon->discount, 'message' => 'Coupon is valid.'];
    }

    /**
     * Calculate the discount amount and final price.
     *
     * @param float $price
     * @param int   $discount Percentage discount (e.g. 10 means 10%)
     * @return array ['discount_amount' => float, 'final_price' => float]
     */
    public static function calculateFinalPrice(float $price, int $discount): array
    {
        $discountAmount = ($price * $discount / 100);
        $finalPrice = $price - $discountAmount;
        return [
            'discount_amount' => round($discountAmount, 2),
            'final_price'     => round($finalPrice, 2),
        ];
    }

    /**
     * Calculate the checkout fee based on the payment method.
     *
     * @param float  $price
     * @param string $method 'stripe' or 'paypal'
     * @return float
     */
    public static function getCheckoutFee(float $price, string $method = 'stripe'): float
    {
        if ($method === 'paypal') {
            $flat_fee = 0.39;
            $percentage_fee = 3.49;
        } else {
            // Default to Stripe fee.
            $flat_fee = 0.30;
            $percentage_fee = 2.9;
        }
        $fee = ($price * ($percentage_fee / 100)) + $flat_fee;
        return round($fee, 2);
    }
}
