@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
       /* Styles for the sticky sidebar */
        .sidebar {
          width: 100%; /* Take the full width of the parent container */
        }

       /* Styles for the sticky behavior on screens larger than col-md */
        @media (min-width: 1199px) {
          .sidebar-wrapper--sticky {
            position: fixed;
            top: 20px; /* Adjust the distance from the top of the viewport as needed */
          }
          .footer__reached{
            top: unset;
            bottom:70px;
          }
        }
    </style>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            
            <div class="d-flex align-items-center gap-3">                        
                <a href="{{ route('user.company.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                    <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                </a>
                 <h4 class="mb-sm-0 font-size-18"> {{ $data->name }}</h4>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>    
                     <li class="breadcrumb-item"><a href="{{ route('user.company.index') }}">Empoyer Guide</a></li>              
                    <li class="breadcrumb-item active">{{ $data->name }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>


    <div class="d-flex align-items-center mb-3 gap-4">

        <a class="fs-1 fw-bold mb-0 d-flex" >
            {{-- <i class=" ri-arrow-left-s-line"></i> --}}
            <span>
                {{ $data->name }}
            </span>
        </a>
        <div class="position-relative">
            <div class="fs-1 ts-heart-container-wrapper  z-10  mt-2 ">
                @include('includes.favorite', ['favdata' => $data, 'type' => 'Company'])
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-xl-8 ">

            <img class="ts-company-list__image mb-4 ts-rounded-12" src="{!! Helpers::image($data->banner, 'company/banner/') !!}" alt="...">

            <div class="" style="min-height:500px">
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
                    @if($data->jobListings)
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link"  href="{{route('user.joblisting.index',$data->slug)}}" role="tab">
                            <span>
                                Jobs
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
                                    $responsse=App\CentralLogics\UserAccess::hasAccess(auth()->user(),'quizbank',$quiz->quizbankmanagement_id);
                                    $UserAccess=$responsse['access']?true:false;//If user has access to quizbank
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
        <div class="col-xl-4">

            <div class="sidebar-wrapper">
                <div class="sidebar" id="stickySidebar">
                    <div class="ts-company-list__example-question card mb-4  bg-white ts-rounded-12" >
                        <div class="card-body  text-center  ">
                            <h2 class="text-primary fw-semibold mb-4">Example Questions and detailed Answers</h2>
                            <a class="btn btn-lg btn-primary px-4"
                                href="{{ route('user.quiz.management.index', ['company_slug' => $data->slug]) }}">Practice Now</a>
                        </div>
                    </div>
                    <div id="search-results">
                        @include('user.company.partials.related-company', [
                            'relatedcompanies' => $relatedcompanies,
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




@section('script')
    <script>
        $(document).ready(function() {
            // Listen for the input event on the search input
            $('#ajaxsearch').on('input', function() {
                var searchTerm = $(this).val();
                var searchUrl = $(this).data('url');
                // Make an AJAX request to the server with the search term
                $.ajax({
                    url: searchUrl,
                    data: {
                        q: searchTerm
                    },
                    success: function(data) {
                        $('#search-results').empty();
                        $('#search-results').html(data);
                    },
                    error: function() {
                        // Handle any errors
                        console.log('Error fetching search results');
                    }
                });
            });
        });
    </script>


<script>

$(document).ready(function() {
    var sidebar = $('#stickySidebar');
    var offsetTop = sidebar.offset().top;
    var sidebarHeight = sidebar.outerHeight();
    var buffer = 50;  // 50px threshold before it toggles back

    $(window).scroll(function() {
        if ($(window).width() >= 768) {
            var scrollTop = $(window).scrollTop();
            var windowHt = $(window).height();
            var footerHt = $('#user_dashboard_footer').height();  // Assuming you have a footer
            var bottomSpace = 30; // Add the space you want from the bottom here

            var parentWidth = sidebar.parent().outerWidth();

            sidebar.width(parentWidth);

            if (scrollTop + windowHt >= $(document).height() - footerHt - bottomSpace) {
                var newBottomPos = (scrollTop + windowHt - $(document).height() + footerHt + bottomSpace);
                sidebar.addClass('footer__reached');
                console.log("reached");
                //sidebar.css('bottom', newBottomPos + 'px');
            } else {
                //sidebar.css('bottom', '');
                sidebar.removeClass('footer__reached');

            }

            if (scrollTop > offsetTop) {
                sidebar.addClass('sidebar-wrapper--sticky');
            } else {
                sidebar.removeClass('sidebar-wrapper--sticky');
            }
        }
    });
});



</script>

@endsection
