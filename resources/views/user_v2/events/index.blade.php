@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('content')




<div class="row fx-bg" style="background-image:url({{ asset('assets/images/subtract2.png') }});">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    
                    <div class="d-flex align-items-center gap-3">                        
                        <a href="{{ route('user.mylearning.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                            <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                        </a>
                        <h4 class="mb-sm-0 font-size-18">Career Events</h4>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                            <li class="breadcrumb-item"><a href="{{ route('user.mylearning.index') }}">Learning</a></li> 
                           
                            <li class="breadcrumb-item active">Career Events</li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        
       {{--  <div class="position-absolute">
            <img src="{{ asset('assets/images/subtract.png') }}">
        </div> --}}

        {{-- <div class="ts-top-banner mb-4">
            <div class="row align-items-center">
                <div class=" col-lg-7 col-xxl-8 ">
                    <h1 class="fw-semibold text-white">{{$banner->title}}</h1>
                    <p class=" mb-3 mb-lg-4 fs-4 text-white ">
                        {{$banner->details}}
                    </p>
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
        </div> --}}

        <div class="row mb-4">
            <div class="col-lg-5 ml-auto">
                <form method="GET" action="{{ route('user.events.index') }}">
                    <div class="d-flex  gap-2">
                            <div class="position-relative w-100">
                                <button type="submit"
                                    class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                                    <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                                </button>
                                <input type="text" name="search" class="form-control w-100 ps-5 ts-rounded-06 apt_search_bar apt-box-shadow"
                                    placeholder="Search..." id="ajaxSearch" value="{{ $search??null }}">
                            </div>
                            <div>
                                <button class="btn btn-warning waves-effect waves-light h-md fs-15 w-md">Search </button>
                            </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
        <h3 class="mpm_title_h mt-5 mb-3">All Events</h3>
        <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3" >

            @foreach ($careerEvents as $data)
                @include('user.events.partials.event')
            @endforeach


        </div>

        
        <div class="row g-0 text-center text-sm-start align-items-center mb-4">
            <div class="col-sm-6">
                <div>
                    <p class="mb-sm-0">Showing {{ $careerEvents->firstItem() }} to {{ $careerEvents->lastItem() }} of
                        {{ $careerEvents->total() }} entries</p>
                </div>
            </div> <!-- end col -->
            <div class="col-sm-6">

                {{ $careerEvents->links('vendor.pagination.default') }}

            </div><!-- end col -->
        </div><!-- end row -->

    </div>
    <!--end col-->
</div>
@endsection




@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
