@extends('front.layouts.app')
@section('title') Home @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/aos/aos.min.css') }}" rel="stylesheet">
<style type="text/css">


</style>
@endsection

@section('content')

@include('front.layouts.sidebar')

<div class="layout-wrapper landing">


    <!-- start hero section -->
    <section class="section hero-section" id="hero">
        <img class="w-100" src="{{asset('assets/front/images/bg_group3.png')}}">
        <div class="position-absolute hero-btn">
             <a href="{{route('user.dashboard')}}" class="btn btn-primary apt-btn-primary w-lg apt-btn-animated apt-rounded-10">Get Started <i class="ri-arrow-right-line align-middle ms-1"></i></a>

            
        </div>
        <!-- end shape -->
    </section>
    <!-- end hero section -->

    

    <!-- start empoyer_guide -->
    <section class="section bg-light empoyer_guide" id="empoyer_guide" style="background-image: url({{ asset('assets/front/images/bg_section1.png') }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 display-5 fw-bold lh-base text-dark"><span class="apt-text-primary">Step1:</span>  Employer  Guide</h1>
                        <p class="">Explore Companies, Application Secrets, and More</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            {{-- <div class="row g-3">
                @for ($i = 0; $i < 7; $i++)
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center p-4 ">
                            <div class="avatar-xl  position-relative d-flex justify-content-center align-items-center mx-auto">
                                <img src="{{ URL::asset('assets/front/images/em'.$i.'.png') }}" alt="" class="i">
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                @endfor
            </div> --}}

            <div class="row  row-cols-md-6 row-cols-sm-3 row-cols-2 " >
                @foreach ($companies as $key => $data)
                    @include('front.company.partials.company_card')
                @endforeach
            </div>

            <!-- end row -->
            <div class="text-center">
             <a href="{{ route('front.company.index') }}" class="btn btn-primary apt-btn-primary w-xl apt-btn-animated apt-rounded-10 btn-lg"> Find more <i class="ri-arrow-right-line align-middle ms-1"></i></a>
             </div>
        </div>
        
    </section>
    <!-- end empoyer_guide -->

    <!-- start job_searching -->
    <section class="section job_searching" id="job_searching" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 display-5 fw-bold lh-base text-dark"><span class="apt-text-primary">Step2:</span>  Job Searching</h1>
                        <p class="">Discover the Latest Grad Job Opportunities</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row vertical_custom_swiper">
                <div  class="swiper responsive-job-swiper rounded p-3 ">
                    <div class="swiper-wrapper">
                        @foreach($joblistings as $joblisting)
                            <div class="swiper-slide">
                               
                                    <div class="card apt-box-shadow apt-rounded-10">
                                        <div class="card-body text-center1 p-4 ps-5">
                                            <div class="job_img_container1 avatar-xl mx-auto1  position-relative ">
                                                <img src="{{Helpers::image($joblisting->company ? $joblisting->company->logo : '', 'company/logo/')}}" alt="" class="img-fluid ">
                                            </div>
                                            <!-- end card body -->
                                            <h5 class="mb-1 mt-2"><a href="{{ route('front.company.show', $joblisting->company->slug) }}" class="text-body">{{$joblisting->company?$joblisting->company->name:''}}</a></h5>
                                            <p class="text-muted  ff-secondary">Posted On: {{$joblisting->created_at->format('M d, Y')}}</p>
                                             <p class="text-muted  ff-secondary">Close Date: {{ $joblisting->last_date ? \Carbon\Carbon::parse($joblisting->last_date)->format('M d, Y') : ''}}</p>

                                             <a href="{{$joblisting->job_link}}" target="__blank" class="btn btn-outline-info waves-effect waves-light apt-rounded-10 apt-btn-outline">Apply Now</a>

                                        </div>
                                    </div>
                                    <!-- end card -->
                                
                            </div>
                        @endforeach
                    </div>
                    <!-- Add pagination if needed -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- end col -->                       
            </div>
            <!-- end row -->
        </div>
        
    </section>
    <!-- end job_searching -->

    <!-- start quiz_practice -->
    <section class="section quiz_practice bg-light" id="quiz_practice" style="background-image: url({{ asset('assets/front/images/bg_section3_iii.png') }})" >

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 display-5 fw-bold lh-base text-dark"><span class="apt-text-primary">Step3:</span>  Quiz Practice</h1>
                        <p class="">Ace Company Challenges with Utmost Preparedness and Confidence</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="position-relative mt-5" >
                <div class="top_right_bg">
                    <img src="{{ asset('assets/front/images/bg_section3_i.png') }}">
                </div>
                <div class="card quiz_practice_card mb-0" >
                    <div id="tsQuizTable" class="ts-quiz-table  ">
                        <table class="apt-rounded-10 overflow-hidden ">
                            <thead>
                                <tr class="apt-bg-primary text-white">
                                    <th scope="col" colspan="2" class="text-center" style="width: 18%;" >Company</th>
                                    <th scope="col" colspan="2">Position</th>
                                    <th scope="col" colspan="2">Region</th>
                                    <th scope="col" colspan="2">Test Stage</th>
                                    <th scope="col" colspan="2">Programme</th>
                                    <th scope="col" colspan="2">
                                        Min. Membership
                                        {{-- Test Type --}}
                                    </th>
                                    <th class="text-center" style="width: 17%;"  scope="col" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($quizmanagements as $data)
                                    <tr>
                                        <td data-label="Company" colspan="2">
                                            <div class="d-flex align-items-center gap-2">
                                                <img height="37" src="{!! Helpers::image($data->company ? $data->company->logo : '', 'company/logo/') !!}" alt="...">
                                                <span>
                                                    {{ $data->company ? $data->company->name : '' }}
                                                </span>
                                            </div>
                                        </td>

                                        
                                        <td colspan="2" data-label="Position">{{ $data->position }}</td>
                                        <td colspan="2" data-label="Location">{{ $data->location }}</td>
                                        <td colspan="2" data-label="Test Stage">{{ $data->assessment_stage }}</td>
                                        <td colspan="2" data-label="Programme">{{ $data->program }}</td>

                                        <td colspan="2" data-label="Min. Package">{{App\CentralLogics\UserAccess::findSuitablePlan($data->assessment_type)}}</td>
                                        {{-- <td data-label="Actions" colspan="2"> --}}
                                        <td colspan="2" data-label="Actions">
                                            <div class="d-flex align-items-center  justify-content-end justify-content-xl-center gap-3">

                                                {{-- <div class="position-relative"> --}}
                                                {{-- <div class="fs-1 ts-heart-container-wrapper ">
                                                    @include('includes.favorite', [
                                                        'favdata' => $data,
                                                        'type' => 'QuizBankManagement',
                                                    ])
                                                </div> --}}
                                                {{-- </div> --}}
                                               
                                                <a class="btn btn-outline-info waves-effect waves-light apt-rounded-10 apt-btn-outline"
                                                    href="{{ route('user.quiz.management.show', $data->slug) }}">Free
                                                    Trial</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>   
                <div class="table_border table_border_1"></div>
                <div class="table_border table_border_2"></div>
                <div class="bottom_right_bg">
                     <img src="{{ asset('assets/front/images/bg_section3_ii.png') }}">
                </div>
            </div>                                      
            <!-- end row -->

            <div class="practice_with position-relative">
                
                <div class="vertical-text">
                    <h5 class="fs-30 fw-bold text-muted">Assessment</h5>
                </div>
                <div class="row ml-50" >
                    <div class="col-md-3 d-flex align-items-center">
                        <h1 class="display-7 fw-bold text-dark">Practice With</h1> 
                    </div>
                    @for ($i = 0; $i < 7; $i++)
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="card apt-rounded-10 apt-box-shadow">
                            <img class="practice_with_img" src="{{ asset('assets/front/images/practice/practice'.($i+1).'.png') }}">
                        </div> 
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        
    </section>
    <!-- end quiz_practice -->

    <!-- start quiz_practice -->
    <section class="section interview_learning" id="interview_learning" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 display-5 fw-bold lh-base text-dark"><span class="apt-text-primary">Step4:</span> Interview Learning</h1>
                        <p class="">Unlock Your Interview Potential with Personalized Coaching</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row g-3">
                <div class="col-lg-7">
                    <img class="w-100" src="{{ asset('assets/front/images/section4.png') }}">
                </div>

               
                <div class="col-lg-4 vertical_custom_swiper">
                    <div class="swiper navigation-swiper rounded">
                        <div class="swiper-wrapper">
                            @foreach ($tutors->chunk(3) as $tutorChunk)
                            <div class="swiper-slide">
                                <div class="row py-2 px-2 align-items-center">
                                    @foreach ($tutorChunk as $tutor)
                                    <div class="col-lg-12">
                                        <div class="card apt-box-shadow">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <span class="avatar-title bg-light text-primary rounded-circle fs-3 p-1">
                                                            <img class="avatar-md rounded-circle header-profile-user" src="{{ Helpers::image($tutor->photo, 'user/avatar/') }}" alt="Tutor Image">
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h4 class=""><a class="text-dark" href="{{ route('user.coach.show', $tutor->slug) }}"> {{ $tutor->name }}</a></h4>
                                                        {{-- <h5 class="">HBS/ExBCG</h5> --}}
                                                        {{-- <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Management Consultant</p> --}}
                                @if ($tutor->language)
                                    <div class="d-flex align-items-center gap-2 mt-1 mb-2">
                                        <i class="bx bx-globe fs-3"></i>
                                        <p class="card-text mb-0 fs-12 text-muted ">
                                            @php
                                             $language = $tutor->language ? json_decode($tutor->language, true) : null;
                                            $language = is_array($language) ? implode(', ', $language) : null;
                                            @endphp
                                            {{$language}}
                                        </p>
                                    </div>
                                @endif
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    @endforeach
                                </div><!-- end row -->
                            </div><!-- end swiper-slide -->
                            @endforeach
                        </div><!-- end swiper-wrapper -->
                        <!-- Add pagination if needed -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div><!-- end swiper-container -->
                </div>
           



                <div class="col-lg-1"></div>
            </div>
            <!-- end row -->
        </div>
        
    </section>            

    <!-- end quiz_practice -->




</div>




@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/swiper/swiper.min.js') }}"></script>
     <script src="{{ URL::asset('/assets/js/pages/swiper.init.js') }}"></script>

    <script>
        
    </script>


    {{-- <script src="{{ URL::asset('/assets/js/pages/landing.init.js') }}"></script> --}}

@endsection
