@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/shepherd.js/shepherd.js.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
       /* .my__Practice .simplebar-content-wrapper,.my__Learning .simplebar-content-wrapper{
                display: flex;
                justify-content: center;
                align-items: center;
        }
        .my__Practice .simplebar-content-wrapper .ts-bg-soft-gray, .my__Learning .simplebar-content-wrapper .ts-bg-soft-gray{
            width:100%;
        }
        .simplebar-content{
            width:100%;
        }*/
    </style>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                                       
                    <li class="breadcrumb-item active">Dashboard</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>    


    <div class="row ">
        <div class="col-xl-8  mb-4 ">
            <div class="card mb-4 ">
                <div class="card-body p-0">
                    <!-- Swiper -->    
                        <div class="swiper navigation-swiper rounded" style="height: 330px;">
                            <div class="swiper-wrapper">
                                @foreach($banners as $banner)
                                    <div class="swiper-slide">        
                                        <a target="_blank" href="{{$banner->file_link}}">                              
                                            <img src="{!! Helpers::image($banner->file, 'banners/') !!}" alt="" class="img-fluid w-100" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
            <!--end col-->
            <div>

                <div id="tsStepGroup" class="ts-step-group row row-cols-sm-4 gap-3 gap-sm-0 px-2  fw-medium">
                    <div class="px-1">
                        <a class="ts-step px-0  h-100" href="{{ route('user.company.index') }}">
                            <div
                                class="ts-step__main border bg-white text-primary py-3 px-2 overflow-hidden d-flex justify-content-center align-items-center px-3  h-100">
                                <p class="text-center fs-14 mb-0 lh-sm">
                                    Employers Guide
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="px-1">
                        <a class="ts-step px-0  h-100" href="{{ route('user.joblisting.index') }}">
                            <div
                                class="ts-step__main border bg-white text-primary py-3 px-2 overflow-hidden d-flex justify-content-center align-items-center px-3  h-100">
                                <p class="text-center fs-14 mb-0 lh-sm">
                                    Job Portal
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="px-1">
                        <a class="ts-step px-0 h-100" href="{{ route('user.quiz.management.index') }}">
                            <div
                                class="ts-step__main border bg-white text-primary py-3 px-2 overflow-hidden d-flex justify-content-center align-items-center px-3  h-100">
                                <p class="text-center fs-14 mb-0 lh-sm">
                                    Quiz Practice
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="px-1">
                        <a class="ts-step px-0 h-100" href="{{ route('user.mylearning.index') }}">
                            <div
                                class="ts-step__main border bg-white text-primary py-3 px-2 overflow-hidden d-flex justify-content-center align-items-center px-3  h-100">
                                <p class="text-center fs-14 mb-0 lh-sm">
                                    Interview Learning
                                </p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card mb-4 ts-rounded-12" id="myFavCollection">
                <!-- Base Example -->
                <div class="card-header d-flex justify-content-between">
                    <h5 class="fs-15 mb-0">My Favrourites</h5>
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0 mt-1 justify-content-end" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#favoriteCompaniess"
                                role="tab">
                                 Companies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#favoriteQuizManagement"
                                role="tab">
                                 Quiz Banks
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body" data-simplebar style="height: 350px;">
                    <div class="tab-content">
                        <div id="favoriteCompaniess" class="tab-pane active" role="tabpanel">
                            <div class="d-flex flex-wrap gap-2 gap-sm-3 justify-content-center mb-3">
                                @foreach ($favoriteCompanies as $favoriteCompany)
                                    @if($favoriteCompany->favoriteable)
                                    <div class="px-0">
                                        <a class="card d-inline-block gap-2 p-3 py-2 shadow border border-gray"
                                            href="{{ route('user.company.show', $favoriteCompany->favoriteable->slug) }}">
                                            <img width="60" src="{!! Helpers::image($favoriteCompany->favoriteable->logo, 'company/logo/') !!}" alt="...">
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div id="favoriteQuizManagement" class="tab-pane" role="tabpanel">
                            @foreach ($favoriteQuiz as $favoriteQuizManagement)
                                @if($favoriteQuizManagement->favoriteable)
                                <div class="card  gap-2 p-3 py-2 shadow-lg border border-1">
                                    <a href="{{ route('user.quiz.management.show', $favoriteQuizManagement->favoriteable->slug) }}"
                                        class="d-flex flex-row  align-items-center justify-content-between ">

                                        <div>
                                            <h5 class="fw-semibold mb-0">{{ $favoriteQuizManagement->favoriteable->name }}</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="ri-trophy-line display-6 text-muted"></i>
                                        </div>
                                    </a>

                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

        </div><!-- end col -->
    </div>


    <div class="row row-cols-lg-2 mb-4">
        <div>
            <div class="card p-3 mb-lg-0 ts-rounded-12">
                <div class="card-header align-items-center d-flex p-3">
                    <h2 class="card-title mb-0 flex-grow-1 fs-18">My Practice</h2>
                </div>

                <div class="card-body my__Practice" data-simplebar style="height: 245px;">
                    @foreach($my_recentQuizbanks->take(3) as $quizaccess)
                    @if($quizaccess->quizBank() && $quizaccess->quizBank->quizBankManagement)
                    <div class="ts-bg-soft-gray p-2 px-3 mb-3">
                        <div class="d-flex align-items-end justify-content-between mb-1 gap-3">
                            <h3 class="mb-0">{{$quizaccess->quizBank()?$quizaccess->quizBank->quizBankManagement->company->name:''}}</h3>
                            @if($quizaccess->quizBank())
                            <a href="{{ route('user.quiz.management.show', $quizaccess->quizBank->quizBankManagement->slug) }}" class="btn btn-light shadow fs-3 d-flex align-items-center p-0 px-1 ">
                                <i class=" ri-play-mini-fill d-flex lh-sm"></i>
                            </a>
                            @endif
                        </div>
                        <p class="mb-2">{{$quizaccess->quizBank()?$quizaccess->quizBank->quizBankManagement->position:''}} - {{$quizaccess->quizBank()?$quizaccess->quizBank->quizBankManagement->assessment_stage:''}} - {{$quizaccess->quizBank()?$quizaccess->quizBank->quizBankManagement->assessment_type:''}}</p>

                        <small class="d-block text-end"> {{$quizaccess->created_at->diffForHumans()}}</small>
                    </div>
                    @endif
                    @endforeach
                    
                    @if($my_recentQuizbanks->count()<1)
                    <div class="ts-bg-soft-gray p-2 px-3">
                        <p>You have not taken any assessments</p>
                        <a href="{{ route('user.quiz.management.index') }}" class="btn btn-primary btn-md rounded-3">Start
                            Practicing</a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div>
            <div class="card p-3 ts-rounded-12" id="my__Learning" >
                {{-- <div class="card-header align-items-center d-lg-flex p-3">
                    <h2 class="card-title mb-0 flex-grow-1 fs-18">My Learning</h2>
                    <ul class="flex-shrink-0 nav nav-tabs-custom card-header-tabs border-bottom-0 " role="tablist" style="margin-bottom: -30px;">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#recent_events"
                                role="tab">
                                 Assessment Simulations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#recent_appointments"
                                role="tab">
                                Interview Appointments
                            </a>
                        </li>
                    </ul>             
                </div> --}}

                 <div class="card-header d-flex justify-content-between">
                    <h5 class="fs-18 mb-0">My Learning</h5>
                    <ul class=" nav nav-tabs-custom card-header-tabs border-bottom-0 justify-content-end" role="tablist" >
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#recent_events"
                                role="tab">
                                 Assessment Simulations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#recent_appointments"
                                role="tab">
                                Interview Appointments
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body my__Learning" data-simplebar style="height: 245px;">
                    <div class="tab-content">
                        <div id="recent_events" class="tab-pane active"  role="tabpanel"> 
                            @if($myrecent_events->count()>0)
                                @foreach($myrecent_events as $myrecent_events)
                                    @php
                                        $itemDetails = App\CentralLogics\Cart::getItemDetails('events', $myrecent_events->event_id);
                                    @endphp
                                    @if($itemDetails)
                                    <div class="ts-bg-soft-gray mb-1">
                                        <div class="row p-3">
                                            <div class="col-md-3">
                                                <div class="avatar-lg1">
                                                    <img src="{{ $itemDetails['photo'] }}" alt="" class="img-fluid d-block bg-light rounded p-1">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h4 class="fw-bold text-truncate"><a href="#" class="text-dark">
                                                {{ $itemDetails['name'] }} </a></h4>
                                                
                                                <p class="mb-0 pb-0">Event Date:</p>
                                               {{ Carbon\Carbon::parse($itemDetails['event_date_time'])->format('F d, H:i A') }}
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                        <a href="{{ $itemDetails['url'] }}" class="btn btn-primary">Visit Event</a>                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                {{-- <p>No recent events Found</p> --}}

                                <div class="ts-bg-soft-gray p-2 px-3">
                                    <p>You have not registered any career event.</p>
                                    <a href="{{ route('user.mylearning.index') }}" class="btn btn-primary btn-md rounded-3">Start
                                        Learning</a>
                                </div>
                            @endif
                        </div>
                        <div id="recent_appointments" class="tab-pane"  role="tabpanel">
                            @if($myrecent_appointments->count()>0) 
                                @foreach($myrecent_appointments as $myrecent_appointment)
                                    @php
                                        $itemDetails = App\CentralLogics\Cart::getItemDetails('interview', $myrecent_appointment->tutor_id);
                                    @endphp
                                    @if($itemDetails)
                                    <div class="ts-bg-soft-gray">
                                        <div class="row p-3">
                                            <div class="col-md-3">
                                                <div class="avatar-lg11 ">
                                                    <img src="{{ $itemDetails['photo'] }}" alt="" class="img-fluid d-block bg-light rounded p-1">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h4 class="fw-bold text-truncate"><a href="#" class="text-dark">
                                                {{ $itemDetails['name'] }} </a></h4>
                                                  
                                                   <p class="mb-0 pb-0">Booking Time:</p>
                                                   <p>                                            {{ isset($myrecent_appointment->start_date) ? \Carbon\Carbon::parse($myrecent_appointment->start_date)->format('d M, Y') : '' }}
                                                        {{ isset($myrecent_appointment->start_time) ? \Carbon\Carbon::parse($myrecent_appointment->start_time)->format('h:i A') : null }}
                                                    </p>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                       <a href="{{ $itemDetails['url'] }}#my_appointment" class="btn btn-primary">View
                                                    Appointments</a>                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                {{-- <p>No recent Appointments Found</p> --}}
                                 <div class="ts-bg-soft-gray p-2 px-3">
                                    <p>You have not booked any appointment.</p>
                                    <a href="{{ route('user.mylearning.index') }}" class="btn btn-primary btn-md rounded-3">Start
                                        Learning</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            

            </div>
        </div>
    </div>

@php
$tourSteps = [
    'title' => 'Welcome Back!',
    'text' => 'Welcome to the tutorial for the Assessment Pass Education System. <br/> <br/>  This tutorial will show you everything you need to finding your target job.',
    'element' => '#myFavCollection',
    'sidebarElement' => '#homeSidebar',
    'position' => 'right',
    'next_button'=> route('user.company.index'),
    'buttons' => [
      // Specify the buttons for this step
    ],
 
  // Add more steps as needed...
];
@endphp
@include('user.includes.tour', ['step' => $tourSteps])


@endsection
@section('script')
    <script>
        // Listen for change event on the select element
        $('#choices-single-no-sorting').on('change', function() {
            var selectedValue = $(this).val();
            // Hide all divs
            $('#favoriteCompaniess').hide();
            $('#favoriteQuizManagement').hide();
            // Show the selected div
            $('#' + selectedValue).show();
        });
        $('.dynamic_divs_select').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();            
            // Hide all divs
            $('#recent_events, #recent_appointments').hide();       
            // Show the selected div based on the selected value
            $('#' + selectedValue).show();
        });
    </script>
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/swiper/swiper.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/swiper.init.js') }}"></script>


   


@endsection
