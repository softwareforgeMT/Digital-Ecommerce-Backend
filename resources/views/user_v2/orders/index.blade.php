@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> Orders</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                                       
                    <li class="breadcrumb-item active">Orders</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div> 

    <div>
        <div class="row align-items-center gy-3 mb-3">
            <div class="col-sm">
                <div>
                    <h5 class="fs-14 mb-0">Your Orders</h5>
                </div>
            </div>

        </div>
        @foreach ($orders as $order)
            <div class="card product border border-1">
                <div class="card-header py-2 bg-soft-dark">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <p class="fs-14 text-muted mb-1 text-uppercase">Order Placed:</p>
                            <h5 class="fs-16 mb-0">{{ $order->created_at->format('F d, Y') }}</h5>
                        </div>
                        <div class="text-end">
                            <p class="fs-14 text-muted mb-1 text-uppercase">Order Id:</p>
                            <h5 class="fs-16 mb-0"><span class="product-price">{{ $order->order_number }}</span></h5>
                        </div>
                    </div>
                </div>
                @foreach ($order->orderItems()->get() as $orderitem)
                    @php
                        $itemDetails = App\CentralLogics\Cart::getItemDetails($orderitem->item_type, $orderitem->item_id);
                    @endphp
                    <div class="card-body">
                        <div class="row gy-3 ">

                            <div class="col-md-9 d-flex ">
                                <div class="avatar-lg me-3">
                                    <img src="{{ $itemDetails['photo'] }}" alt="" class="img-fluid d-block bg-light rounded p-1">
                                </div>
                                <div class="">
                                    <h3 class="fw-bold text-truncate d-block"><a href="#" class="text-dark">
                                         {{ ucwords(str_replace("_", " ", $orderitem->item_type)) }}: {{ $itemDetails['name'] }}  </a>
                                    </h3>
                                    <div class="d-block">
                                        @if($orderitem->item_type=== 'interview')
                                            @php
                                                $appointmentdata = App\Models\Appointment::where('student_id', Auth::id())
                                                    ->where('order_item_id', $orderitem->id)
                                                    ->latest()
                                                    ->first();
                                            @endphp
                                        <p class="mb-0 pb-0">Booking Time:</p>

                                            {{ isset($appointmentdata->start_date) ? \Carbon\Carbon::parse($appointmentdata->start_date)->format('d M, Y') : '' }}
                                            {{ isset($appointmentdata->start_time) ? \Carbon\Carbon::parse($appointmentdata->start_time)->format('h:i A') : null }}
                                     
                                        @elseif($orderitem->item_type === 'events')
                                        <p class="mb-0 pb-0">Event Date:</p>
                                               {{ Carbon\Carbon::parse($itemDetails['event_date_time'])->format('F d, H:i A') }}
                                        @endif
                                    </div>  
                                </div>      
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="">

                                    @if ($orderitem->item_type == 'events')
                                        <a href="{{ $itemDetails['url'] }}" class="btn btn-primary">Visit Event</a>
                                    @elseif($orderitem->item_type == 'quizbank')
                                        <a href="{{ $itemDetails['url'] }}" class="btn btn-primary">Start your
                                            Practices</a>
                                    @elseif($orderitem->item_type == 'interview')
                                        <a href="{{ $itemDetails['url'] }}#my_appointment" class="btn btn-primary">View
                                            Appointments</a>
                                    @elseif($orderitem->item_type == 'subscription_plan')
                                        {{-- <a href="" class="btn btn-primary">Start your Practices</a> --}}
                                    @endif
                                    {{-- <a href="#" class="btn btn-warning ">Archive order</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- card body -->
                <div class="card-footer">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 gy-3">
                        <div>
                            <div class="d-flex align-items-center gap-2 text-muted">
                                {{--  <div>Estimated delivery :</div>
                                <h5 class="fs-14 mb-0">Oct 27, 2019</h5> --}}
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 text-muted">
                                <div>Total Price :</div>
                                <h5 class="fs-14 mb-0"><span
                                        class="product-line-price">{{ Helpers::setCurrency($order->pay_amount) }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card footer -->
            </div>
        @endforeach



        {{-- <div class="text-end mb-4">
            <a href="/checkout" class="btn btn-success btn-label right ms-auto"><i
                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
        </div> --}}
    </div>
    </div>
@endsection




@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
