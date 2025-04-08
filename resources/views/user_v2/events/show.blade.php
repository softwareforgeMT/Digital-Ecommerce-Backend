@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
           
            <div class="d-flex align-items-center gap-3">                        
                <a href="{{ route('user.events.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                    <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                </a>
                 <h4 class="mb-sm-0 font-size-18">Event Information</h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                    <li class="breadcrumb-item"><a href="{{ route('user.mylearning.index') }}">Learning</a></li> 

                    <li class="breadcrumb-item"><a href="{{ route('user.events.index') }}">Career Events</a></li>                      
                    <li class="breadcrumb-item active">Event Information</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mb-4 mb-lg-0">
                            <div>
                                <div class="mb-4">

                                    <div class="d-flex align-items-center gap-3  mb-3 ">
                                      
                                        <h3 class="fw-semiboldtext-black mb-0">{{ $data->name }}</h3>
                                    </div>

                                    {{-- <h1 class="text-black fw-bold ">{{ $data->name }}</h1> --}}


                                    <p class="fs-5 text-muted ">
                                        {{ Carbon\Carbon::parse($data->event_date_time)->format('F d, H:i A') }}
                                    </p>
                                    @if ($userEvent)
                                        <h4 class="text-black ">Your Registration ID : {{ $userEvent->registration_id }}
                                        </h4>
                                        <h4 class="text-black ">Meeting Room : <a target="_blank" href="{{ $data->meeting_id }}" class="btn-default">Meeting Link</a> </h4>

                                    @endif

                                    <h4 class="text-black ">Host : {{ $data->host_name }}</h4>
                                     <h4 class="text-black ">Event Type: {{$data->event_type}}</h4>

                                    @if($UserAccess && !$userEvent)
                                    <h4 class="text-black">Registration Fee: <span class="text-success">Free for you</span>
                                      </h4>   
                                    @elseif($UserAccess && $userEvent)
                                    @else
                                     <h4 class="text-black ">Registration Fee:
                                        {{ $data->price > 0 ? Helpers::setCurrency($data->price) : 'Free' }}</h4>
                                    @endif
                                   

                                    {{--  <h4 class="text-black ">Or <span class="text-danger"> Essential Package </span> for Free
                                    </h4> --}}


                                </div>
                                @if (!$userEvent)
                                    <div class="d-flex justify-content-start gap-3">

                                        <form method="POST" action="{{ route('user.cart.addItem') }}">
                                            @csrf
                                            <input type="hidden" name="item_type" value="events">
                                            <input type="hidden" name="item_id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-primary ts-rounded-06 px-4">Register
                                                Now</button>
                                        </form>
                                       {{--  @if (!$UserAccess)
                                            <a href="{{ route('user.pricing') }}"
                                                class="btn btn-primary ts-rounded-06 px-4">Upgrade Now</a>
                                        @endif --}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($data->intro_video)
                            <div class="col-lg-4">
                                <div class="ratio ratio-16x9">
                                    <video class="rounded"
                                        src="{{ Helpers::image($data->intro_video, 'events/intro_videos/') }}"
                                        controls></video>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div>


                @if ($data->details)
                    <div class="card fx-bg"  style="background-image:url({{ asset('assets/images/subtract2.png') }});">
                        <div class="card-body">
                            <div class="tab-content ">

                                <h1 class="fw-bold">
                                    Details
                                </h1>
                                <p>
                                    {!! isset($data->details) ? $data->details : '' !!}
                                </p>

                            </div>
                        </div><!-- end card-body -->
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection




@section('script')
@endsection
