@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/companies.min.css') }}" />
@endsection
@section('content')
    <!-- ********************************[ SEARCH SECTION ]************************************* -->
    <div class="container pt-09">
        <div class="text-center ts-font-poppins">
            <h1 class="fw-bold ts-heading-03 mb-04">Pick Your
                <span class="text-primary">Interests</span>
            </h1>
            <p class="ts-desc-04 ts-text-Rhythm">
                You're welcome to choose your target companies to explore our career
                platform
            </p>
        </div>
    </div>

    <h1>working</h1>

    <!-- ********************************[  CARDS ]************************************* -->
    @if (!$step2)
        <div class="container ts-sec-pt-md ts-sec-mb-md">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="GET" action="{{ route('front.pick-interests') }}">
                        <div class="position-relative">
                            <button type="submit"
                                class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                                <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                            </button>
                            <input type="text" name="search" class="form-control w-100 ps-5 ts-rounded-06"
                                placeholder="Search..." id="basiInput" value="{{ $search }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="ts-grid-4col mb-5">
                @foreach ($companies as $key => $data)
                    <div class="ts-check-card  overflow-hidden">
                        <div class="ts-check-card-input-group">
                            <label class="ts-check-card-input-label" for="{{ $data->slug }}"></label>
                            <input class="form-check-input mt-0" type="checkbox" id="{{ $data->slug }}"
                                data-type="Company" data-id="{{ $data->id }}" onclick="toggleFavorite($(this))"
                                {{ $data->favorited_by(auth()->user()) ? 'checked' : '' }} />
                        </div>
                        <div class="ts-check-card__image-group11 d-block text-center">
                            <img loading="lazy" class=" w-50 w-sm-35 mb-3" src="{!! Helpers::image($data->logo, 'company/logo/') !!}" alt="..." />
                            <div>
                                <h4 class="mb-0">{{ $data->name }}</h4>
                            </div>

                        </div>


                    </div>
                @endforeach
            </div>
            <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                <div class="col-sm-4">
                    <div>
                        <p class="mb-sm-0">Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of
                            {{ $companies->total() }} entries</p>
                    </div>
                </div> <!-- end col -->
                <div class="col-sm-4">
                    {{ $companies->links('vendor.pagination.default') }}
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <div>
                        <a class="ts-btn-01" href="{{ route('front.pick-interests', 'step2') }}">Next</a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    @else
        <div class="container ts-sec-pt-md ts-sec-mb-md">
            <form method="POST" id="pickintereststepform" action="{{ route('front.pick-interests.step2.submit') }}">
                @csrf
                @include('admin.includes.alerts')
                <div class="d-flex align-items-center justify-content-center gap-3 mb-5">
                    <div class="ts-check-card" style="width:240px">
                        <div class="ts-check-card-input-group">
                            <label class="ts-check-card-input-label" for="ts-check-card-input-internship"></label>
                            <input class="form-check-input mt-0" type="radio" id="ts-check-card-input-internship"
                                name="internshipGraduate" value="internship"
                                {{ Auth::user()->internshipgraduate == 'internship' ? 'checked' : '' }} />
                        </div>
                        <div class="ts-check-card__image-group11 d-block text-center">
                            {{-- <img loading="lazy" class=" w-50 w-sm-35 mb-3" src="{!! Helpers::image($data->logo, 'company/logo/') !!}" alt="..." /> --}}
                            <div>
                                <h4 class="mb-0">Internship</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ts-check-card" style="width:240px">
                        <div class="ts-check-card-input-group">
                            <label class="ts-check-card-input-label" for="ts-check-card-input-graduate"></label>
                            <input class="form-check-input mt-0" type="radio" id="ts-check-card-input-graduate"
                                name="internshipGraduate" value="graduate"
                                {{ Auth::user()->internshipgraduate == 'graduate' ? 'checked' : '' }} />
                        </div>
                        <div class="ts-check-card__image-group11 d-block text-center">
                            {{-- <img loading="lazy" class=" w-50 w-sm-35 mb-3" src="{!! Helpers::image($data->logo, 'company/logo/') !!}" alt="..." /> --}}
                            <div>
                                <h4 class="mb-0">Graduate</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif


@endsection
@section('script')
    <script>
        // Listen for change event on radio buttons
        $('input[name="internshipGraduate"]').on('click', function() {
            // Trigger form submission
            $('#pickintereststepform').submit();
        });
    </script>
    <script src="{{ asset('assets/common_assets/js/favorite.js') }}"></script>
@endsection
