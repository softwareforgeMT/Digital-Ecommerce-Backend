@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('css')
    <!-- ApexCharts CSS -->
    <link href="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.css') }}" rel="stylesheet">
<style>
    .timeline-item{
        padding-top: 2px !important;
        margin-top:10px;
    }
</style>

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

 <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">{{ Helpers::getGreeting() }}, {{ucfirst(Auth::guard('admin')->user()->name) }}!</h4>
                            <p class="text-muted mb-0">Here's what's happening with your store
                                today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            
                                <div class="row g-3 mb-0 align-items-center">
                                    
                                    <!--end col-->
                                    <div class="col-auto">
                                        <a href="{{route('admin.product.create')}}" class="btn btn-soft-success"><i
                                                class="ri-add-circle-line align-middle me-1"></i>
                                            Add Product</a>
                                    </div>
                                  
                                </div>
                                <!--end row-->
                           
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>


    <!-- Quick Stats Cards Row -->
    <div class="row g-4 mb-5">
        <!-- Revenue Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate overflow-hidden dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-sm ">
                            <div class="avatar-title bg-primary bg-gradient text-white rounded-3 shadow-sm">
                                <i class="ri-money-dollar-circle-line fs-4"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="fw-medium text-uppercase text-muted mb-1 fs-14">Total Revenue</p>
                            <h4 class="fs-22 fw-semibold mb-0">{{ Helpers::setCurrency($totalRevenue) }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center  gap-2 mb-3">
                        <span class="badge {{ $revenueChange >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            <i class="ri-arrow-{{ $revenueChange >= 0 ? 'up' : 'down' }}-line align-bottom"></i>
                            {{ abs($revenueChange) }}%
                        </span>
                        <span class="text-muted fs-12">from previous period</span>
                    </div>
                    <div class="mt-4">
                        <div class="progress animated-progress custom-progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ min($revenueTarget, 100) }}%" aria-valuenow="{{ $revenueTarget }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted fs-12 mb-0 mt-1">{{ $revenueTarget }}% of monthly target</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate overflow-hidden dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-sm ">
                            <div class="avatar-title bg-info bg-gradient text-white rounded-3 shadow-sm">
                                <i class="ri-shopping-bag-3-line fs-4"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="fw-medium text-uppercase text-muted mb-1 fs-14">Total Orders</p>
                            <h4 class="fs-22 fw-semibold mb-0">{{ $totalOrders }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge {{ $ordersChange >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            <i class="ri-arrow-{{ $ordersChange >= 0 ? 'up' : 'down' }}-line align-bottom"></i>
                            {{ abs($ordersChange) }}%
                        </span>
                        <span class="text-muted fs-12">from previous period</span>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                            <div class="badge bg-success-subtle text-success px-2 py-1">
                                <i class="ri-checkbox-circle-line align-bottom"></i> {{ $completedOrders }} Completed
                            </div>
                            <div class="badge bg-warning-subtle text-warning px-2 py-1">
                                <i class="ri-time-line align-bottom"></i> {{ $pendingOrders }} Pending
                            </div>
                            <div class="badge bg-danger-subtle text-danger px-2 py-1">
                                <i class="ri-close-circle-line align-bottom"></i> {{ $cancelledOrders }} Cancelled
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate overflow-hidden dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-sm ">
                            <div class="avatar-title bg-success bg-gradient text-white rounded-3 shadow-sm">
                                <i class="ri-user-3-line fs-4"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="fw-medium text-uppercase text-muted mb-1 fs-14">Total Customers</p>
                            <h4 class="fs-22 fw-semibold mb-0">{{ $totalCustomers }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge {{ $customersChange >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            <i class="ri-arrow-{{ $customersChange >= 0 ? 'up' : 'down' }}-line align-bottom"></i>
                            {{ abs($customersChange) }}%
                        </span>
                        <span class="text-muted fs-12">from previous period</span>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted fs-12">New this month: <span class="fw-semibold text-dark">{{ $newCustomersThisMonth }}</span></span>
                            </div>
                            <div>
                                <span class="text-muted fs-12">Active: <span class="fw-semibold text-dark">{{ $activeCustomers }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate overflow-hidden dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-sm ">
                            <div class="avatar-title bg-warning bg-gradient text-white rounded-3 shadow-sm">
                                <i class="ri-stack-line fs-4"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="fw-medium text-uppercase text-muted mb-1 fs-14">Total Products</p>
                            <h4 class="fs-22 fw-semibold mb-0">{{ $totalProducts }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge {{ $productsChange >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            <i class="ri-arrow-{{ $productsChange >= 0 ? 'up' : 'down' }}-line align-bottom"></i>
                            {{ abs($productsChange) }}%
                        </span>
                        <span class="text-muted fs-12">from previous period</span>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-danger-subtle text-danger px-2 py-1">
                                    <i class="ri-alert-line align-bottom"></i> {{ $lowStockProducts }} Low Stock
                                </span>
                            </div>
                            <div>
                                <span class="badge bg-info-subtle text-info px-2 py-1">
                                    <i class="ri-check-double-line align-bottom"></i> {{ $activeProducts }} Active
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Charts Row -->
    <div class="row">
        <!-- Sales Chart -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Sales Overview</h5>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown">
                                <span class="fw-semibold text-uppercase fs-12">Sort By:</span>
                                <span class="text-muted">
                                    {{ $salesOverviewPeriod }}
                                    <i class="mdi mdi-chevron-down ms-1"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item {{ $period == '7days' ? 'active' : '' }}"
                                   href="{{ route('admin.dashboard', ['period' => '7days']) }}">
                                    Last 7 Days
                                </a>
                                <a class="dropdown-item {{ $period == '30days' ? 'active' : '' }}"
                                   href="{{ route('admin.dashboard', ['period' => '30days']) }}">
                                    Last 30 Days
                                </a>
                                <a class="dropdown-item {{ $period == 'month' ? 'active' : '' }}"
                                   href="{{ route('admin.dashboard', ['period' => 'month']) }}">
                                    This Month
                                </a>
                                <a class="dropdown-item {{ $period == 'year' ? 'active' : '' }}"
                                   href="{{ route('admin.dashboard', ['period' => 'year']) }}">
                                    This Year
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0 pb-2">
                    <div id="sales-analytics-chart" class="apex-charts" style="height: 380px;"></div>
                </div>
            </div>
        </div>

        <!-- Order Status Distribution -->
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Order Status Distribution</h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-soft-primary btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="order-status-chart" class="apex-charts" style="height: 270px;"></div>

                    <div class="mt-3 pt-2">
                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                            <p class="text-body mb-0">
                                <i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i> Completed
                            </p>
                            <div>
                                <span class="text-dark fw-medium">{{ $orderStatusCounts['completed'] ?? 0 }}</span>
                                ({{ $orderStatusPercentages['completed'] ?? 0 }}%)
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                            <p class="text-body mb-0">
                                <i class="ri-checkbox-blank-circle-fill text-warning align-middle me-2"></i> Pending
                            </p>
                            <div>
                                <span class="text-dark fw-medium">{{ $orderStatusCounts['pending'] ?? 0 }}</span>
                                ({{ $orderStatusPercentages['pending'] ?? 0 }}%)
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                            <p class="text-body mb-0">
                                <i class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i> Cancelled
                            </p>
                            <div>
                                <span class="text-dark fw-medium">{{ $orderStatusCounts['cancelled'] ?? 0 }}</span>
                                ({{ $orderStatusPercentages['cancelled'] ?? 0 }}%)
                            </div>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <p class="text-body mb-0">
                                <i class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i> Processing
                            </p>
                            <div>
                                <span class="text-dark fw-medium">{{ $orderStatusCounts['processing'] ?? 0 }}</span>
                                ({{ $orderStatusPercentages['processing'] ?? 0 }}%)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Recent Activity Row -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-xl-6">
            <div class="card card-height-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Recent Orders</h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> View All
                        </a>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-nowrap align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentOrders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                               class="fw-medium link-primary">#{{ $order->order_number }}</a>
                                        </td>
                                        <td>{{ $order->user ? Str::limit($order->user->name, 15) : 'Guest' }}</td>
                                        <td>{{ $order->created_at->format('d M') }}</td>
                                        <td>{{ Helpers::setCurrency($order->total) }}</td>
                                        <td>
                                            <span class="badge 
                                                {{ $order->status == 'completed' ? 'bg-success' : '' }}
                                                {{ $order->status == 'pending' ? 'bg-warning' : '' }}
                                                {{ $order->status == 'processing' ? 'bg-info' : '' }}
                                                {{ $order->status == 'cancelled' ? 'bg-danger' : '' }}
                                            ">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-3">No recent orders</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Selling Products -->
        <div class="col-xl-6">
            <div class="card card-height-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Top Selling Products</h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-soft-info btn-sm">
                            <i class="ri-eye-line align-middle"></i> View All
                        </a>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-nowrap align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topSellingProducts as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img src="{{ Helpers::image($product->main_image, 'products/') }}" alt="" class="avatar-xs rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="fw-medium link-primary text-truncate" style="max-width: 150px; display: inline-block;">
                                                        {{ $product->name }}
                                                    </a>
                                                    <small class="text-muted d-block">
                                                        {{ $product->category ? $product->category->name : 'Uncategorized' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Helpers::setCurrency($product->price) }}</td>
                                        <td><span class="text-success fw-medium">{{ $product->total_sold }}</span></td>
                                        <td>{{ Helpers::setCurrency($product->total_revenue) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3">No product sales data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Activity & Stock Alerts -->
     <div class="row g-4 mb-5">
        <!-- Recent Activity -->
        <div class="col-xl-8">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-transparent border-bottom d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Recent Activity</h5>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-secondary btn-sm rounded-pill">
                            <i class="ri-refresh-line align-middle me-1"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="px-3 pt-3" data-simplebar style="max-height: 400px;">
                        <ul class="list-unstyled mb-0">
                            @forelse($recentActivity as $activity)
                                <li class="pb-3 mb-3 {{ !$loop->last ? 'border-bottom ' : '' }}">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm">
                                                <div class="avatar-title rounded-circle 
                                                    @if($activity['type'] == 'order')
                                                        bg-primary bg-opacity-10 text-primary
                                                    @elseif($activity['type'] == 'user')
                                                        bg-success bg-opacity-10 text-success
                                                    @elseif($activity['type'] == 'product')
                                                        bg-info bg-opacity-10 text-info
                                                    @elseif($activity['type'] == 'review')
                                                        bg-warning bg-opacity-10 text-warning
                                                    @else
                                                        bg-secondary bg-opacity-10 text-secondary
                                                    @endif d-flex align-items-center justify-content-center">
                                                    @if($activity['type'] == 'order')
                                                        <i class="ri-shopping-bag-line fs-5"></i>
                                                    @elseif($activity['type'] == 'user')
                                                        <i class="ri-user-add-line fs-5"></i>
                                                    @elseif($activity['type'] == 'product')
                                                        <i class="ri-store-2-line fs-5"></i>
                                                    @elseif($activity['type'] == 'review')
                                                        <i class="ri-star-line fs-5"></i>
                                                    @else
                                                        <i class="ri-notification-line fs-5"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-body mb-1">{!! $activity['message'] !!}</p>
                                            <p class="text-muted fs-12 mb-0">
                                                <i class="mdi mdi-clock-outline align-middle me-1"></i> {{ $activity['time'] }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="text-center py-5">
                                    <i class="ri-calendar-check-line fs-2 text-muted mb-2 d-block"></i>
                                    <p class="text-muted mb-0">No recent activity</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Alerts -->
        <div class="col-xl-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-transparent border-bottom d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Inventory Alerts</h5>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-danger btn-sm rounded-pill">
                            <i class="ri-alert-line align-middle me-1"></i> {{ count($lowStockProductsList) }} Items
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="px-3 pt-3" data-simplebar style="max-height: 400px;">
                        <div class="vstack gap-3">
                            @forelse($lowStockProductsList as $product)
                                <div class="p-3 border  rounded">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-danger bg-opacity-10 text-danger rounded d-flex align-items-center justify-content-center">
                                                    <i class="ri-error-warning-line fs-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3 overflow-hidden">
                                            <h6 class="fs-14 mb-1 text-truncate">
                                                <a href="{{ route('admin.product.edit', $product->id) }}" class="link-dark text-decoration-none">
                                                    {{ $product->name }}
                                                </a>
                                            </h6>
                                            <p class="text-muted mb-0 small">SKU: {{ $product->sku }}</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge rounded-pill {{ $product->quantity <= 0 ? 'bg-danger' : 'bg-warning' }}">
                                                {{ $product->quantity <= 0 ? 'Out of Stock' : 'Low Stock: ' . $product->quantity }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <div class="avatar-lg mx-auto mb-4">
                                        <div class="avatar-title bg-success bg-opacity-10 text-success fs-1 rounded d-flex align-items-center justify-content-center">
                                            <i class="ri-check-double-line"></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-1">All products in stock</h5>
                                    <p class="text-muted mb-0">No inventory alerts at the moment.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top text-center py-3">
                    <a href="{{ route('admin.product.index') }}" class="link-secondary text-decoration-none">
                        View All Inventory <i class="ri-arrow-right-line align-middle ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof ApexCharts === 'undefined') {
                console.error('ApexCharts is not loaded!');
                return;
            }

            // --- Sales Overview Bar Chart ---
            var salesData  = @json($salesChartData);
            var orderData  = @json($ordersChartData);
            var categories = @json($salesChartLabels);

            var barOptions = {
                series: [
                    {
                        name: 'Revenue',
                        data: salesData
                    },
                    {
                        name: 'Orders',
                        data: orderData
                    }
                ],
                chart: {
                    type: 'bar',
                    height: 380,
                    toolbar: { show: false },
                    zoom:    { enabled: false }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%',
                        borderRadius: 4
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: categories,
                    labels: {
                        rotate: -45,
                        style: { fontSize: '12px' }
                    }
                },
                yaxis: [
                    {
                        title: {
                            text: 'Revenue'
                        },
                        labels: {
                            formatter: function(val) {
                                return "{{ Helpers::getCurrencySymbol() }}" + val.toFixed(0);
                            }
                        }
                    },
                    {
                        opposite: true,
                        title: {
                            text: 'Orders'
                        },
                        labels: {
                            formatter: function(val) {
                                return val.toFixed(0);
                            }
                        }
                    }
                ],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: [
                        {
                            formatter: function(val) {
                                return "{{ Helpers::getCurrencySymbol() }}" + val.toFixed(2);
                            }
                        },
                        {
                            formatter: function(val) {
                                return val + " orders";
                            }
                        }
                    ]
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetY: -10
                },
                colors: ['#4f46e5', '#10b981'],
                responsive: [
                    {
                        breakpoint: 768,
                        options: {
                            chart: { height: 300 },
                            plotOptions: {
                                bar: { columnWidth: '70%' }
                            }
                        }
                    }
                ]
            };

            new ApexCharts(
                document.querySelector("#sales-analytics-chart"),
                barOptions
            ).render();

            // --- Order Status Donut Chart ---
            var statusData   = @json(array_values($orderStatusCounts));
            var statusLabels = @json(array_keys($orderStatusCounts));
            var statusColors = {
                completed: '#10b981',
                pending:   '#f59e0b',
                cancelled: '#ef4444',
                processing:'#3b82f6',
                shipped:   '#8b5cf6',
                delivered: '#10b981',
                refunded:  '#6b7280'
            };
            var chartColors = statusLabels.map(s => statusColors[s] || '#6b7280');

            var donutOptions = {
                series: statusData,
                chart: { type: 'donut', height: 270 },
                labels: statusLabels.map(s => s.charAt(0).toUpperCase() + s.slice(1)),
                colors: chartColors,
                legend: { show: false },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Orders',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce((a,b) => a + b, 0);
                                    }
                                }
                            }
                        }
                    }
                }
            };

            new ApexCharts(
                document.querySelector("#order-status-chart"),
                donutOptions
            ).render();
        });
    </script>
@endsection
