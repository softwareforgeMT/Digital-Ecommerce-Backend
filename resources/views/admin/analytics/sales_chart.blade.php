<div class="card">
    <div class="card-header border-0 align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Orders & Sales Analytics</h4>
        <div>
            <button data-value="all" class="btn btn-soft-secondary btn-sm autoFilters">All</button>
            <button data-value="1M" class="btn btn-soft-secondary btn-sm autoFilters">1M</button>
            <button data-value="6M" class="btn btn-soft-secondary btn-sm autoFilters">6M</button>
            <button data-value="1Y" class="btn btn-soft-primary btn-sm autoFilters">1Y</button>
        </div>
    </div><!-- end card header -->

    <div class="card-header p-0 border-0 bg-soft-light">
        <div class="row g-0 text-center">
            <div class="col-6 col-sm-6">
                <div class="p-3 border border-dashed border-start-0">
                    <h5 class="mb-1"><span class="counter-value"
                            data-target="{{$currentOrders}}">0</span></h5>
                    <p class="text-muted mb-0">Orders</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-6 col-sm-6">
                <div class="p-3 border border-dashed border-start-0">
                    <h5 class="mb-1">{{ Helpers::generalVariables()['currency_symbol'] }}<span class="counter-value"
                            data-target="{{ Helpers::getPrice($currentSales) }}">0</span></h5>
                    <p class="text-muted mb-0">Sales</p>
                </div>
            </div>
            <!--end col-->
           {{--  <div class="col-6 col-sm-3">
                <div class="p-3 border border-dashed border-start-0">
                    <h5 class="mb-1"><span class="counter-value"
                            data-target="367">0</span></h5>
                    <p class="text-muted mb-0">Refunds</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-6 col-sm-3">
                <div
                    class="p-3 border border-dashed border-start-0 border-end-0">
                    <h5 class="mb-1 text-success"><span class="counter-value"
                            data-target="18.92">0</span>%</h5>
                    <p class="text-muted mb-0">Conversation Ratio</p>
                </div>
            </div> --}}
            <!--end col-->
        </div>
    </div><!-- end card header -->

    <div class="card-body p-0 pb-2">
        <div class="w-100">
            <div id="customer_impression_charts_1"
                data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                class="apex-charts" dir="ltr"></div>
        </div>
    </div><!-- end card body -->
</div><!-- end card -->