@extends('front.layouts.app')
@section('title') Empoyee Guide @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/aos/aos.min.css') }}" rel="stylesheet">
<style type="text/css">


</style>
@endsection

@section('content')


        <div class="fpage_content bg-light apt_company_index" style="background-image: url({{ asset('assets/front/images/bg_section1.png') }})" >

                <div class="container">

                        <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="text-center mb-5">
                                        <h1 class="mb-3 display-5 fw-bold lh-base apt-text-primary">  Employer  Guide</h1>
                                        <p class="">Explore Companies, Application Secrets, and More</p>
                                    </div>
                                </div>
                                <!-- end col -->
                        </div>

                        <div class="row mb-4 m-auto">
                                <div class="col-lg-6 m-auto">
                                    <form method="GET" action="{{ route('front.company.index') }}">
                                        <div class="d-flex  gap-2">
                                                <div class="position-relative w-100">
                                                    <button type="submit"
                                                        class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                                                        <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                                                    </button>
                                                    <input type="text" name="search" class="form-control w-100 ps-5 ts-rounded-06 apt_search_bar apt-box-shadow"
                                                        placeholder="Search..." id="basiInput" value="{{ $search }}">
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary apt-btn-primary h-md fs-15 w-md">Search </button>
                                                </div>
                                        </div>
                                        
                                    </form>
                                </div>
                        </div>
                        <div class="row mt-5 row-cols-md-5 row-cols-sm-3 row-cols-2" >
                                @foreach ($companies as $key => $data)
                                    @include('front.company.partials.company_card')
                                @endforeach
                        </div>
                        <div class="row g-0 text-center text-sm-start align-items-center mb-4 mt-4">
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
                </div>

        </div>
@endsection
@section('script')

@endsection
