@extends('front.layouts.app')
@section('title') Empoyee Guide @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/aos/aos.min.css') }}" rel="stylesheet">
<style type="text/css">

    <style type="text/css">
       /* Styles for the sticky sidebar */
        .sidebar {
          width: 100%; /* Take the full width of the parent container */
        }

       /* Styles for the sticky behavior on screens larger than col-md */
        @media (min-width: 992px) {
            /* Styles for col-lg columns go here */
            .sidebar-wrapper--sticky {
                position: fixed;
                top: 80px; /* Adjust the distance from the top of the viewport as needed */
              }
              .footer__reached{
                top: unset;
                bottom:50px;
              }
        }
    </style>

</style>
@endsection

@section('content')


    <div class="fpage_content bg-light" >


 


        <div class="container">

            <div class="d-flex align-items-center gap-3">                        
                <a href="{{ route('front.company.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                    <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                </a>
                 <h4 class="mb-sm-0 display-6 fw-bold lh-base apt-text-primary"> Employer  Guide</h4>
            </div>

            <div class="ts-top-banner mb-4" style="background-image:url({{asset('assets/front/images/bg_banner.png')}})">
                <div class="row align-items-center" >
                    <div class="col-lg-4 ml-2">
                        <h1 class="fw-semibold text-white ps-5">{{ $data->name }}</h1>
                        @if($data->small_description)
                        <div class="small_desc position-relative">
                            <span class="q_mark  position-absolute">“</span>
                            <p class=" mb-3 mb-lg-4 fs-4 text-white ps-5">
                                {!! isset($data->small_description)?$data->small_description:'' !!}
                            </p>
                        </div>
                        @endif

                    </div>
                    <div class="col-lg-8">
                        
                        <div class="position-relative">
                            <img class="apt-banner-image apt-rounded-10" src="{!! Helpers::image($data->banner, 'company/banner/') !!}" alt="...">
                        </div>
                    </div>
                </div>
            </div>   


            <div class="row mb-5">
                <div class="col-lg-8 ">
                    <div class="" style="min-height:600px">
                        <!-- Nav tabs  Started-->
                        <ul class="ts-tab nav nav-pills  nav-justified1 " role="tablist">
                            @if($data->details)
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#information" role="tab">
                                    <span>
                                        Company Information
                                    </span>
                                </a>
                            </li>
                            @endif
                            @if($data->application_process)
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#application_process" role="tab">
                                    <span>
                                        Real Samples
                                    </span>
                                </a>
                            </li>
                            @endif
                            @if($samplequestion->count()>0)
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#freePractice-question" role="tab">
                                    <span>
                                        Practice Question
                                    </span>
                                </a>
                            </li>
                            @endif
                            @if($data->position_details)
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#position_details" role="tab">
                                    <span>
                                        Position
                                    </span>
                                </a>
                            </li>
                             @endif


                        </ul>
                        <!-- Nav tabs End -->
                        <div class="card summernote__data" >

                            {{-- <div class="card-header border-0 p-0 ">
                            </div> --}}
                            <div class="card-body">
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="information" role="tabpanel">
                                        <p>{!! isset($data->details) ? $data->details : '' !!}</p>
                                    </div>
                                    <div class="tab-pane" id="application_process" role="tabpanel">
                                        <p>{!! isset($data->application_process) ? $data->application_process : '' !!}</p>
                                    </div>
                                    
                                    <div class="tab-pane" id="freePractice-question" role="tabpanel">
                                        @foreach($samplequestion as $quiz)

                                        @if($quiz->question_type==='Pdf-based')
                                            @php
                                                if(Auth::check()){
                                                $responsse=App\CentralLogics\UserAccess::hasAccess(auth()->user(),'quizbank',$quiz->quizbankmanagement_id);
                                                $UserAccess=$responsse['access']?true:false;//If user has access to quizbank
                                                }else{
                                                  $UserAccess=false;  
                                                }
                                            @endphp

                                            <div class="card ts-rounded-12 overflow-hidden">
                                                <div class="card-header text-center"> 
                                                    <h3 class="text-dark">All-In-One PDF Solution</h3>
                                                </div>
                                                @include('user.quizmanagement.partials.pdfBased.pdf_pages', ['partial_pdf' => 1])
                                            </div> 
                                        @else
                                            <h3 class="fw-bold">
                                            {{ $quiz->title }}                             
                                            </h3>
                                            <div class="card ts-rounded-12 overflow-hidden">
                                                <div class="card-body ">
                                                    <div class="ts-question">
                                                        <h3 class="mb-0">{!! isset($quiz->details) ? $quiz->details : '' !!}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($quiz->options)
                                                @php
                                                    $letters = range('A', 'Z'); // Generate an array of letters from A to Z
                                                    $optionCount = count(json_decode($quiz->options));
                                                @endphp
                                                @foreach (json_decode($quiz->options) as  $key=>$option)
                                                <div class="card d-flex flex-row ts-rounded-12 overflow-hidden">
                                                    <div class="card-body ">
                                                        <div class="ts-question">
                                                            <div class="ts-answer ">

                                                                @if ($optionCount > 1)
                                                                <div>
                                                                    <h3
                                                                        class="ts-3 ts-answer__number border border-1 border-primary d-flex justify-content-center align-items-center ts-rounded-12 mb-0">
                                                                       {{ $letters[$key] }}</h3>
                                                                </div>
                                                                @endif

                                                                <div>
                                                                    {{ $option }}
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="ts-answer-view-more bg-primary text-white d-flex justify-content-center align-items-center px-2">
                                                        <i class="fs-2 mdi mdi-dots-vertical"></i>

                                                    </div>
                                                </div>
                                                @endforeach 
                                            @endif
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="position_details" role="tabpanel">
                                        <p>{!! isset($data->position_details) ? $data->position_details : '' !!}</p>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">

                    <div class="sidebar-wrapper">
                        <div class="sidebar" id="stickySidebar">
                            <div class="px-1 py-2 card mb-4  bg-white ts-rounded-12 apt-box-shadow" >
                                <div class="card-body  text-center  ">
                                    <h3 class="apt-text-primary fw-semibold mb-4">Example Questions and detailed Answers</h3>
                                    <a class="btn btn-lg btn-primary px-4 apt-btn-primary apt-btn-animated"
                                        href="{{ route('user.quiz.management.index', ['company_slug' => $data->slug]) }}">Practice Now <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                                </div>
                            </div>
                            <div id="search-results">
                                @include('front.company.partials.related-company', [
                                    'relatedcompanies' => $relatedcompanies,
                                ])
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
@section('script')
<script>

$(document).ready(function() {
    var sidebar = $('#stickySidebar');
    var offsetTop = sidebar.offset().top;
    var sidebarHeight = sidebar.outerHeight();
    var reachedFooter = false;

    $(window).scroll(function() {

        if ($(window).width() >= 992) {
            var scrollTop = $(window).scrollTop();
            var windowHt = $(window).height();
            var footerHt = $('.custom-footer').height();  // Assuming you have a footer
            var bottomSpace = 150; // Add the space you want from the bottom here

            var parentWidth = sidebar.parent().outerWidth();

            sidebar.width(parentWidth);

            if (scrollTop + windowHt >= $(document).height() - footerHt - bottomSpace) {
                sidebar.addClass('footer__reached');
            } else {
                sidebar.removeClass('footer__reached');
            }

            if(scrollTop + windowHt >= $(document).height() - footerHt - 20){
                    reachedFooter = true; // Sidebar reached footer
            }else{
                 reachedFooter = false; // Sidebar reached footer
            }

            if (!reachedFooter && scrollTop > offsetTop) {
                sidebar.addClass('sidebar-wrapper--sticky');
            } else {
                sidebar.removeClass('sidebar-wrapper--sticky');
            }
        }
    });
});



</script>

@endsection
