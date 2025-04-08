@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('content')

<div class="row ms-1 fx-bg" style="background-image:url({{ asset('assets/images/subtract2.png') }});">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    

                    <div class="d-flex align-items-center gap-3">                        
                        <a href="{{ route('user.mylearning.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                            <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                        </a>
                        <h4 class="mb-sm-0 font-size-18">Coaching</h4>   
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                            <li class="breadcrumb-item"><a href="{{ route('user.mylearning.index') }}">Learning</a></li>                       
                            <li class="breadcrumb-item active">Coaching</li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>
       {{--  <div class="position-absolute">
            <img src="{{ asset('assets/images/subtract.png') }}">
        </div> --}}

  
        {{--  <div class="ts-top-banner mb-4">
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
                <form method="GET" action="{{ route('user.coaching.index') }}">
                    <div class="d-flex  gap-2">
                            <div class="position-relative w-100">
                                <button type="submit"
                                    class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                                    <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                                </button>
                                <input type="text" name="search" class="form-control w-100 ps-5 ts-rounded-06 apt_search_bar apt-box-shadow"
                                    placeholder="Search..." id="ajaxSearch" value="{{ $search }}">
                            </div>
                            <div>
                                <button class="btn btn-warning waves-effect waves-light h-md fs-15 w-md">Search </button>
                            </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="mpm_title">
                    <h2 class="mpm_title_h">The most <br>popular  mentor</h2>
                    <p class="mt-4">Unlock Your Interview Potential with Personalized Coaching</p>
                </div>
                
            </div>
            @foreach ($topTutors as $data)
                <div class="col-sm-6 col-md-4">
                    <div class="card mp_team__cards ts-rounded-12 overflow-hidden">
                        <img class="card-img-top img-fluid  ts-object-fit-cover" 
                            src="{{ Helpers::image($data->photo, 'user/avatar/') }}" alt="Card image cap">
                        <div class="card-body ">
                            <div class="" style="min-height:60px">
                                <div>
                                    <h4 class="card-title text-capitalize text-black fw-bold mb-2">{{ $data->name }}
                                    </h4>
                                </div>
                                @if ($data->language)
                                    <div class="d-flex align-items-center gap-2 mt-1 mb-2 fw-semibold">
                                        <i class="bx bx-globe fs-5"></i>
                                        <p class="card-text mb-0">
                                            @php
                                             $language = $data->language ? json_decode($data->language, true) : null;
                                            $language = is_array($language) ? implode(', ', $language) : null;
                                            @endphp
                                            {{$language}}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            
                            
                            
                            <div class="d-flex align-items-center justify-content-between gap-2 ">
                                <h4 class="card-title1 text-warning fw-medium mb-0">
                                    {{ Helpers::setCurrency($data->price) }}</h4>

                                <a href="{{ route('user.coach.show', $data->slug) }}"
                                    class="btn btn-outline-secondary waves-effect waves-light  ts-rounded-06 ">Book Now
                                    <i class="ri-arrow-right-line align-middle ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="mpm_title_h mt-5 mb-3">All Mentors</h3>
        <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3" >
            @foreach ($tutorsData as $data)
                <div>
                    <div class="card team__cards ts-rounded-12 overflow-hidden">
                        <img class="card-img-top img-fluid  ts-object-fit-cover" 
                            src="{{ Helpers::image($data->photo, 'user/avatar/') }}" alt="Card image cap">
                        <div class="card-body ">
                            <div class="" style="min-height:60px">
                                <div>
                                    <h4 class="card-title text-capitalize text-black fw-bold mb-2">{{ $data->name }}
                                    </h4>
                                </div>
                                @if ($data->language)
                                    <div class="d-flex align-items-center gap-2 mt-1 mb-2 fw-semibold">
                                        <i class="bx bx-globe fs-5"></i>
                                        <p class="card-text mb-0">
                                            @php
                                             $language = $data->language ? json_decode($data->language, true) : null;
                                            $language = is_array($language) ? implode(', ', $language) : null;
                                            @endphp
                                            {{$language}}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            
                            
                            
                            <div class="d-flex align-items-center justify-content-between gap-2 ">
                                <h4 class="card-title1 text-warning fw-medium mb-0">
                                    {{ Helpers::setCurrency($data->price) }}</h4>

                                <a href="{{ route('user.coach.show', $data->slug) }}"
                                    class="btn btn-outline-secondary waves-effect waves-light  ts-rounded-06 ">Book Now
                                    <i class="ri-arrow-right-line align-middle ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-0 text-center text-sm-start align-items-center mb-4 ms-2">
            <div class="col-sm-6">
                <div>
                    <p class="mb-sm-0">Showing {{ $tutorsData->firstItem() }} to {{ $tutorsData->lastItem() }} of
                        {{ $tutorsData->total() }} entries</p>
                </div>
            </div> <!-- end col -->
            <div class="col-sm-6">

                {{ $tutorsData->links('vendor.pagination.default') }}

            </div><!-- end col -->
        </div><!-- end row -->

    </div>
</div>

@endsection




@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
