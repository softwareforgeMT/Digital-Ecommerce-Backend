
 <div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Sales by Coupon</h4>
    </div><!-- end card header -->
    <div class="card-body">
            <div id=""
                data-series="[{{$salesByCoupon['couponOrders']}}, {{$salesByCoupon['withoutCouponOrders']}}]"
                data-labels='["Coupon", "Without Coupon"]'
                data-total-label="Total Orders"
                class="apex-charts apex-charts-dashboard"
                dir="ltr">
            </div>
            <div class="mt-3">
                <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                    <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i> Coupon</p>
                    <div>
                        <span class="text-muted pe-5">{{$salesByCoupon['couponOrders']}}</span>
                        <span class="text-success fw-medium fs-12">{{Helpers::getPrice($salesByCoupon['couponOrdersPercentage'])}}%</span>
                    </div>
                </div><!-- end -->
                <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                    <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i> Without Coupon</p>
                    <div>
                        <span class="text-muted pe-5">{{$salesByCoupon['withoutCouponOrders']}} </span>
                        <span class="text-success fw-medium fs-12">{{Helpers::getPrice($salesByCoupon['withoutCouponOrdersPercentage'])}}%</span>
                    </div>
                </div><!-- end -->
            </div>
    </div><!-- end card body -->
</div><!-- end card -->