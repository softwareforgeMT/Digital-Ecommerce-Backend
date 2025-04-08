@extends('admin.layouts.master')
@section('title') Orders @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')

@slot('li_1') <a href="{{ route('admin.orders.index') }}"> Orders</a> @endslot
@slot('title') Invoice Details @endslot
@endcomponent


<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card" id="demo">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header border-bottom-dashed p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <img src="{{ URL::asset('assets/images/logo-lg.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="40">
                                <img src="{{ URL::asset('assets/images/logo-lg.png') }}" class="card-logo card-logo-light" alt="logo light" height="40">

                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Legal
                                        Registration No:</span>
                                    <span id="legal-register-no">987654</span>
                                </h6>
                                <h6><span class="text-muted fw-normal">Email:</span>
                                    <span id="email">{{$gs->from_email}}</span>
                                </h6>
                                <h6><span class="text-muted fw-normal">Website:</span> <a href="{{route('front.index')}}" class="link-primary" target="_blank" id="website">www.{{$gs->name}}.com</a></h6>
                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> +(01) 234 6789</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-no">{{$order->order_number}}</span></h5>
                            </div>

                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-date">{{$order->created_at->format('j M, Y')}}</span> <small class="text-muted" id="invoice-time">{{$order->created_at->format('h:i A')}}</small></h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                
                                <span class="badge {{$order->payment_status=='completed'?'badge-soft-success':'badge-soft-danger'}}  fs-11" id="payment-status">{{ucfirst($order->payment_status)}}</span>
                               
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                <h5 class="fs-14 mb-0">{{Helpers::setCurrency($order->pay_amount)}}</h5>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4 border-top border-top-dashed">
                        <div class="row g-3">
                            <div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Customer Details</h6>
                                <p class="fw-medium mb-2" id="billing-name">{{$order->user?ucfirst($order->user->name):''}}</p>
                              
                                 <p class="text-muted mb-1"><span>Email : </span><span >{{$order->user?$order->user->email:''}}</span></p>
                                <p class="text-muted mb-1"><span>Phone: </span><span id="billing-phone-no">{{$order->user?$order->user->phone:''}}</span></p>
                                
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center1 table-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th scope="col">Product Details</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col" class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">
                                @foreach ($order->orderItems()->get() as $key=>$orderitem)
                                    @php
                                        $itemDetails = App\CentralLogics\Cart::getItemDetails($orderitem->item_type, $orderitem->item_id);
                                    @endphp
                                    
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ $itemDetails['photo'] }}" alt="" class="img-fluid d-block">
                                                </div>
                                               <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="" class="link-primary">{{ $itemDetails['name'] }}</a></h5>
                                                    <p class="text-muted mb-0">ItemType: <span class="fw-medium">{{ ucwords(str_replace("_", " ", $orderitem->item_type)) }}</span></p>
                                                    {{-- <p class="text-muted mb-0">Size: <span class="fw-medium">M</span></p> --}}
                                               </div>
                                            </div>
                                        </td>
                                        <td>{{Helpers::setCurrency($orderitem->price)}}</td>
                                        <td>{{$orderitem->quantity}}</td>
                                       
                                        <td class="fw-medium text-end">
                                            {{Helpers::setCurrency($orderitem->price)}}
                                        </td>
                                    </tr>
                                @endforeach    
                                    
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                        <td class="text-end">{{ Helpers::setCurrency($order->subtotal) }}</td>
                                    </tr>
                                    @if($order->subscription_discount>0)
                                    <tr>
                                        <td>Previous Subscription Discount : :</td>
                                        <td class="text-end">-{{ Helpers::setCurrency($order->subscription_discount) }}</td>
                                    </tr>
                                    @endif
                                    @if($order->discount>0)
                                    <tr>
                                        <td>Discount <span class="text-muted">({{$order->coupon_code}})</span> : :</td>
                                        <td class="text-end">-{{ Helpers::setCurrency($order->discount) }}</td>
                                    </tr>
                                    @endif
                                    @if($order->checkout_fee>0)
                                    <tr>
                                        <td>Estimated Tax :</td>
                                        <td class="text-end">{{ Helpers::setCurrency($order->checkout_fee) }}</td>
                                    </tr>
                                    @endif
                                    <tr class="border-top border-top-dashed">
                                        <th scope="row">Total ({{$gs->currency_code}}) :</th>
                                        <th class="text-end">{{ Helpers::setCurrency($order->pay_amount) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                             <a  href="javascript:window.print()" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>

                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>


@endsection
@section('script')

{{-- <script src="{{ URL::asset('/assets/js/pages/invoicedetails.js') }}"></script> --}}
@endsection
