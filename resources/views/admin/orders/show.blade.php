@extends('admin.layouts.master')
@section('title') Orders @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')

@slot('li_1') <a href="{{ route('admin.orders.index') }}"> Orders</a> @endslot
@slot('title') Orders Details @endslot
@endcomponent


 <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                   <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order ID : {{$order->order_number}}
                            <p class="mb-0">
                                <small class="text-muted">Order Placed : {{$order->created_at->format('j M, Y h:i A')}}</small>
                            </p>
                        </h5>

                        <div class="flex-shrink-0">
                            <a href="{{route('admin.orders.invoice.show',$order->id)}}" class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                        </div>
                   </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                  <th scope="col">Product Details</th>
                                  <th scope="col">Item Price</th>
                                  <th scope="col">Quantity</th>
                                  
                                  <th scope="col" class="text-end">Total Amount</th>
                                </tr>
                              </thead>
                            <tbody>

                                @foreach ($order->orderItems()->get() as $orderitem)
                                @php
                                    $itemDetails = App\CentralLogics\Cart::getItemDetails($orderitem->item_type, $orderitem->item_id);
                                @endphp
                                <tr>
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
                                
                                <tr class="border-top border-top-dashed">
                                    <td colspan="3"></td>
                                    <td colspan="2" class="fw-medium p-0">
                                        <table class="table table-borderless mb-0">
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
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end card-->
           
        </div><!--end col-->
        <div class="col-xl-3">
            @if($order->user)
            <div class="card">
                <div class="card-header">
                   <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                        <div class="flex-shrink-0">
                            <a href="{{route('admin.users.show',$order->user->id)}}" class="link-secondary">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{!! Helpers::image($order->user->photo, 'user/avatar/', 'user.png') !!}" alt="" class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                   <h6 class="fs-14 mb-1">{{ucfirst($order->user->name)}}</h6>
                                   <p class="text-muted mb-0">Customer</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{$order->user->email}}</li>
                        @if($order->user->phone)
                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{$order->user->phone}}</li>
                        @endif
                    </ul>
                </div>
            </div><!--end card-->
            @endif
            @if($order->transaction)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment Details</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Transaction Id:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0 text-break">{{$order->transaction->txn_id}}</h6>
                         </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Payment Method:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{$order->transaction->payment_gateway}}</h6>
                         </div>
                    </div>
                    {{-- <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Card Holder Name:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">Joseph Parker</h6>
                         </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Card Number:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                         </div>
                    </div> --}}
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Total Amount:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{ Helpers::setCurrency($order->transaction->amount) }}</h6>
                         </div>
                    </div>
                </div>
            </div><!--end card-->
            @endif
        </div><!--end col-->
    </div><!--end row-->


@endsection
@section('script')


</script>


@endsection
