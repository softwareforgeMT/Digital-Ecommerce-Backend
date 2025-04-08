@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/shepherd.js/shepherd.js.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Empoyer Guide</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>                 
                    <li class="breadcrumb-item active">Empoyer Guide</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

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
                {{-- <div class="ratio ratio-16x9 rounded">
                    <video controls>
                        <source src="{!! Helpers::image($banner->video, 'banners/video/') !!}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div> --}}
                

                <div class="ratio ratio-16x9 rounded">
                    <video width="320" height="240" class="video-element" poster="@isset($banner->file){!! Helpers::image($banner->file, 'banners/') !!}@endif" controls>
                       <source src="{!! Helpers::image($banner->video, 'banners/video/') !!}" type="video/mp4">
                       
                       Your browser does not support the video tag.
                    </video>
                </div>

            </div>
        </div>
    </div>
    {{-- </div> --}}

    {{--     <div class="row mb-4">
        <div class=" col-lg-6">
            <div class="position-relative">
                <button class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                    <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                </button>
                <input type="text" class="form-control w-100 ps-5" placeholder="Search... " id="basiInput">
            </div>
        </div>
    </div> --}}
    <div class="row mb-4">
        <div class="col-lg-6">
            <form method="GET" action="{{ route('user.company.index') }}">
                <div class="position-relative">
                    <button type="submit"
                        class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                        <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                    </button>
                    <input type="text" name="search" class="form-control w-100 ps-5 ts-rounded-06 "
                        placeholder="Search..." id="basiInput" value="{{ $search }}">
                </div>
            </form>
        </div>
    </div>
    <div class="row  row-cols-md-5 " id="companiesDatta2">
        @foreach ($companies as $key => $data)
            <div class="mb-4">
                <div id="employGuide{{ $data->slug }}" class="position-relative card-animate">
                    <div class="fs-1 ts-heart-container-wrapper position-absolute z-10 pt-2 ps-2 mt-4 ms-4 ">
                        @include('includes.favorite', ['favdata' => $data, 'type' => 'Company'])
                    </div>
                    <a href="{{ route('user.company.show', $data->slug) }}">
                        <div class="ratio ratio-1x1">
                            <div
                                class="card gap-2 p-3 py-2 d-flex justify-content-center align-items-center shadow-lg ts-rounded-12 text-center ">
                                <img class=" w-100 w-sm-3522 mb-3" src="{!! Helpers::image($data->logo, 'company/logo/') !!}" alt="...">
                                 
                               {{--  <div>
                                    <h4 class="mb-0">{{ $data->name }}</h4>
                                    <p class="mb-0">{{ $data->small_description }}</p>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of
                    {{ $companies->total() }} entries</p>
            </div>
        </div> <!-- end col -->
        <div class="col-sm-6">

            {{ $companies->links('vendor.pagination.default') }}

        </div><!-- end col -->
    </div><!-- end row -->

@php
$tourSteps = [
 
    'title' => 'Welcome Back!',
    'text' => 'You can find the application Guidance and assessment process in this section.',
    'element' => '#companiesDatta2',
    'position' => 'top',
    'prev_button'=> route('user.dashboard'),
    'next_button'=> route('user.joblisting.index'),
    'buttons' => [
      // Specify the buttons for this step
    ],
 
  // Add more steps as needed...
];
@endphp
@include('user.includes.tour', ['step' => $tourSteps])

@endsection



@section('script')
{{--      <script src="{{ URL::asset('/assets/libs/shepherd.js/shepherd.js.min.js') }}"></script>
    <script>
        var employGuide = new Shepherd.Tour({
            defaultStepOptions: {
                cancelIcon: {
                    enabled: true,
                },

                classes: "shadow-md bg-purple-dark",
                scrollTo: {
                    behavior: "smooth",
                    block: "center",
                },
            },
            useModalOverlay: {
                enabled: true,
            },
        });

        if (document.querySelector("#employGuide2"))
            employGuide.addStep({
                title: "Welcome Back !",
                text: "You can fing the application Guidance and assessment process in this section.",
                attachTo: {
                    element: "#employGuide2",
                    on: "top",
                },
                buttons: [

                    {
                        text: "Exit Tutorial",
                        classes: "btn btn-danger ",
                        action: employGuide.complete,
                    },
                    {
                        text: "Prev",
                        classes: "btn btn-success ms-auto",
                        action() {
                            window.location.href = "/home";
                            return this.next();
                        },
                    },
                    {
                        text: "Next",
                        classes: "btn btn-warning text-white ",
                        action() {
                            window.location.href = "/quiz-practice";
                            return this.next();
                        },
                    },
                ],
            });

        employGuide.start();
    </script>  --}}
@endsection
