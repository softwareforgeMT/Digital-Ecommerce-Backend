@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/shepherd.js/shepherd.js.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Learning</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>                 
                    <li class="breadcrumb-item active">Learning</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">


            <div class="ts-top-banner mb-4">
                <div class="row align-items-center">
                    <div class=" col-lg-7 col-xxl-8 ">
                        <h1 class="fw-semibold text-white">{{$banner->title}}</h1>
                        <p class=" mb-3 mb-lg-4 fs-4 text-white ">
                            {{$banner->details}}
                        </p>
                        <div class="text-lg -end">
                            {{-- <button class="btn btn-primary px-4 fs-4">Buy Now</button> --}}
                            {{-- <button class="btn btn-primary px-4 ">Buy Now</button> --}}
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-4">
                       <div class="ratio ratio-16x9 rounded">
                            <video width="320" height="240" class="video-element" poster="@isset($banner->file){!! Helpers::image($banner->file, 'banners/') !!}@endif" controls>
                               <source src="{!! Helpers::image($banner->video, 'banners/video/') !!}" type="video/mp4">
                               
                               Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card ts-rounded-12 overflow-hidden" id="AssesssmentCard22">
                <div class=" ts-dia row row-cols-lg-3 justify-content-evenly py-3">
                    <div class="ts-dia__item">
                        <div class="card rounded-0 overflow-hidden shadow-none mb-0 h-100">
                            <div class="card-header border-0 pt-lg-0">
                                <img class="card-img-top img-fluid ts-rounded-12"
                                    src="{{ URL::asset('assets/images/learning/self-recorded.png') }}" alt="Card image cap">
                            </div>
                            <div class="card-body pb-lg-0 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">Self-recorded</h4>
                                    <p class="card-text mb-4">
                                       AssessmentPass provides an unique self-recorded function for candidates to simulate the video interviews, which can help you prepare your virtual interviews better.
                                    </p>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('user.quiz.management.index.selfrecord') }}"
                                        class="btn btn-primary px-4">Enter Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ts-dia__item">
                        <div class="card rounded-0 overflow-hidden shadow-none mb-0 h-100">
                            <div class="card-header border-0 pt-lg-0">
                                <img class="card-img-top img-fluid ts-rounded-12"
                                    src="{{ URL::asset('assets/images/learning/interview_coaching.png') }}" alt="Card image cap">
                            </div>
                            <div class="card-body pb-lg-0 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">Interview Coaching</h4>
                                    <p class="card-text mb-4">
                                        AssessmentPass provides an a world-wide career coach services where candidates can find professional expertise to build their own customized structures and practical skills for career interviews.
                                    </p>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('user.coaching.index') }}" class="btn btn-primary px-4">Enter Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ts-dia__item">
                        <div id="AssesssmentCard" class="card rounded-0 overflow-hidden shadow-none mb-0 h-100">
                            <div class="card-header border-0 pt-lg-0">
                                <img class="card-img-top img-fluid ts-rounded-12"
                                    src="{{ URL::asset('assets/images/learning/assessment_ simulation.png') }}" alt="Card image cap">
                            </div>
                            <div class="card-body pb-lg-0 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">Assessment Simulation</h4>
                                    <p class="card-text mb-4">
                                        AssessmentPass provides various career relevant group events such as case study discussion, industrial Q&A session, simulated assessment centre where candidates can discover and experience a real career assessment environment.
                                    </p>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('user.events.index') }}" class="btn btn-primary px-4">Enter
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--end col-->
        </div>


@php
$tourSteps = [
 
    'title' => 'Welcome Back!',
    'text' => 'You can find everything you need to help preparing your interview',
    'element' => '#AssesssmentCard22',
    'position' => 'top',
    'prev_button'=> route('user.quiz.management.index'),
    'next_button'=> route('user.earnings'),
    'buttons' => [
      // Specify the buttons for this step
    ],
 
  // Add more steps as needed...
];
@endphp
@include('user.includes.tour', ['step' => $tourSteps])


    @endsection




    @section('script')

    @endsection
