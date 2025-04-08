@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/images/front/pages/companies.min.css') }}" />
@endsection
@section('content')
    <!-- ********************************[ SEARCH SECTION ]************************************* -->
    {{-- <div class="ts-bg-edf5fe">
      <div class="container pt-09 pb-09">
        <!-- DROPDOWN BUTTONS  -->
        <div
          class="d-flex flex-wrap align-items-center justify-content-between mb-06"
        >
          <div class="d-flex flex-wrap gap-3">
            <div>
              <select
                class="form-select ts-form-select form-select-lg ts-text-151e3a ts-desc-06 fw-semibold ts-font-inter ts-focus-0"
                aria-label=".form-select-lg example"
              >
                <option selected>Location</option>
                <option value="1">Location</option>
                <option value="2">Location</option>
                <option value="3">Location</option>
              </select>
            </div>
            <div>
              <select
                class="form-select ts-form-select form-select-lg ts-text-151e3a ts-desc-06 fw-semibold ts-font-inter ts-focus-0"
                aria-label=".form-select-lg example"
              >
                <option selected>Department</option>
                <option value="1">Department</option>
                <option value="2">Department</option>
                <option value="3">Department</option>
              </select>
            </div>
            <div>
              <select
                class="form-select ts-form-select form-select-lg ts-text-151e3a ts-desc-06 fw-semibold ts-font-inter ts-focus-0"
                aria-label=".form-select-lg example"
              >
                <option selected>Education level</option>
                <option value="1">Education level</option>
                <option value="2">Education level</option>
                <option value="3">Education level</option>
              </select>
            </div>
          </div>
          <div>
            <a
              class="ts-text-151e3a ts-desc-06 text-decoration-none fw-semibold ts-font-poppins"
              href="#"
              >clear all</a
            >
          </div>
        </div>
        <!-- SEARCH BAR -->
        <div class="d-flex gap-3 mb-06">
          <div class="input-group">
            <span
              class="input-group-text ts-bg-fff border-0 pt-03 pb-03 pe-1 ps-3"
              id="basic-addon1"
            >
              <a class="ts-flex-center" href="#"
                ><img
                  width="15"
                  height="15"
                  loading="lazy"
                  src="{{ asset('assets/images/front/icon/search-Icon.svg')}}"
                  alt="..."
              /></a>
            </span>
            <input
              type="text"
              class="form-control ts-focus-0 ts-text-151e3a ts-font-inter ts-desc-05 border-0"
              placeholder="Search"
              aria-describedby="basic-addon1"
            />
          </div>
          <a
            class="ts-flex-center ts-bg-fff px-3 text-decoration-none gap-2 rounded-3"
            href="#"
          >
            <img
              width="15"
              height="10"
              loading="lazy"
              src="{{ asset('assets/images/front/icon/filters.svg')}}"
              alt="..."
            />
            <span class="ts-text-151e3a ts-font-inter ts-desc-05">Filters</span>
          </a>
        </div>
        <!-- selections -->
        <div class="d-flex flex-wrap ts-gap-10">
          <div
            class="alert ts-bg-fff ts-companies-category-button alert-dismissible fade show ts mb-0"
            role="alert"
          >
            <span class="ts-text-151e3a ts-font-poppins ts-desc-07"
              >Category 1</span
            >
            <button
              type="button"
              class="btn-close ts-focus-0 ts-companies-category-button-close-icon"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          </div>
          <div
            class="alert ts-bg-fff ts-companies-category-button alert-dismissible fade show mb-0"
            role="alert"
          >
            <span class="ts-text-151e3a ts-font-poppins ts-desc-07"
              >Category 2</span
            >
            <button
              type="button"
              class="btn-close ts-focus-0 ts-companies-category-button-close-icon"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          </div>
          <div
            class="alert ts-bg-fff ts-companies-category-button alert-dismissible fade show mb-0"
            role="alert"
          >
            <span class="ts-text-151e3a ts-font-poppins ts-desc-07"
              >Category 3</span
            >
            <button
              type="button"
              class="btn-close ts-focus-0 ts-companies-category-button-close-icon"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          </div>
          <div
            class="alert ts-bg-fff ts-companies-category-button alert-dismissible fade show mb-0"
            role="alert"
          >
            <span class="ts-text-151e3a ts-font-poppins ts-desc-07"
              >Category 4</span
            >
            <button
              type="button"
              class="btn-close ts-focus-0 ts-companies-category-button-close-icon"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          </div>
          <div
            class="alert ts-bg-fff ts-companies-category-button alert-dismissible fade show mb-0"
            role="alert"
          >
            <span class="ts-text-151e3a ts-font-poppins ts-desc-07"
              >Category 5</span
            >
            <button
              type="button"
              class="btn-close ts-focus-0 ts-companies-category-button-close-icon"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          </div>
        </div>
      </div>
    </div>
    <!-- ********************************[ COMPANIES CARDS ]************************************* -->
    <div class="container ts-sec-pt-md ts-sec-mb-md">
      <div class="ts-grid-4col">
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <div class="companies-card">
          <div class="companies-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div>
        <!-- code companies.scss line 86 -->
        <!-- <div class="ts-check-card">
          <div class="ts-check-card-input-group">
            <label
              class="ts-check-card-input-label"
              for="ts-check-card-input"
            ></label>
            <input
              class="form-check-input mt-0"
              type="checkbox"
              id="ts-check-card-input"
            />
          </div>
          <div class="ts-check-card__image-group">
            <img loading="lazy" src="{{ asset('assets/images/front/img/logo-sm.svg')}}" alt="..." />
          </div>
        </div> -->
      </div>
    </div> --}}
    <div class="bg-soft-primary">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <select class="form-control" id="choices-single-no-sorting" name="choices-single-no-sorting"
                            data-choices data-choices-sorting-false>
                            <option value="Location">Location</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="London">London</option>
                            <option value="Manchester">Manchester</option>
                            <option value="Liverpool">Liverpool</option>
                            <option value="Paris">Paris</option>
                            <option value="Malaga">Malaga</option>
                            <option value="Washington" disabled>Washington</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Marseille">Marseille</option>
                            <option value="Hamburg">Hamburg</option>
                            <option value="Munich">Munich</option>
                            <option value="Barcelona">Barcelona</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Montreal">Montreal</option>
                            <option value="New York">New York</option>
                            <option value="Michigan">Michigan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <select class="form-control" id="choices-single-no-sorting" name="choices-single-no-sorting"
                            data-choices data-choices-sorting-false>
                            <option value="Department">Department</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="London">London</option>
                            <option value="Manchester">Manchester</option>
                            <option value="Liverpool">Liverpool</option>
                            <option value="Paris">Paris</option>
                            <option value="Malaga">Malaga</option>
                            <option value="Washington" disabled>Washington</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Marseille">Marseille</option>
                            <option value="Hamburg">Hamburg</option>
                            <option value="Munich">Munich</option>
                            <option value="Barcelona">Barcelona</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Montreal">Montreal</option>
                            <option value="New York">New York</option>
                            <option value="Michigan">Michigan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <select class="form-control" id="choices-single-no-sorting" name="choices-single-no-sorting"
                            data-choices data-choices-sorting-false>
                            <option value="Education Level">Education Level</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="London">London</option>
                            <option value="Manchester">Manchester</option>
                            <option value="Liverpool">Liverpool</option>
                            <option value="Paris">Paris</option>
                            <option value="Malaga">Malaga</option>
                            <option value="Washington" disabled>Washington</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Marseille">Marseille</option>
                            <option value="Hamburg">Hamburg</option>
                            <option value="Munich">Munich</option>
                            <option value="Barcelona">Barcelona</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Montreal">Montreal</option>
                            <option value="New York">New York</option>
                            <option value="Michigan">Michigan</option>
                        </select>
                    </div>
                </div>

                <div class=" col-lg-12">
                    <div class="position-relative">
                        <button
                            class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                            <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                        </button>
                        <input type="text" class="form-control w-100 ps-5 ts-rounded-06" placeholder="Search... "
                            id="basiInput">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">

        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 mb-5">
            @for ($i = 1; $i < 17; $i++)
                <div class="mb-4">
                    <div id="employGuide{{ $i }}" class="position-relative card-animate">
                        <div class="fs-1 ts-heart-container-wrapper position-absolute z-10 pt-2 ps-2 mt-4 ms-4 ">
                            <div class="ts-heart-container  ">
                                <input type="checkbox" id="{{ $i }}">
                                <label class="icon--heart" for="{{ $i }}">
                                    <div class="ts-heart-checked ">
                                        <i class="ri-heart-3-fill cursor-pointer "></i>
                                    </div>
                                    <div class="ts-heart-unchecked">
                                        <i class="ri-heart-3-line cursor-pointer "></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <a href="/employ-guide-details">
                            <div class="ratio ratio-1x1">
                                <div
                                    class="card   gap-2 p-3 py-2 d-flex justify-content-center align-items-center shadow-lg rounded-3 text-center">
                                    <img class=" w-50 w-sm-35 mb-3"
                                        src="{{ URL::asset('assets/images/logo-sm-dark.svg') }}" alt="...">

                                    <div>
                                        <h4 class="mb-0">Company {{ $i }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
        <div class="row g-0 text-center text-sm-start align-items-center mb-4">
            <div class="col-sm-6">
                <div>
                    <p class="mb-sm-0">Showing 1 to 8 of 12 entries</p>
                </div>
            </div> <!-- end col -->
            <div class="col-sm-6">
                <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                    <li class="page-item disabled"> <a href="#" class="page-link"><i
                                class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"> <a href="#" class="page-link">1</a> </li>
                    <li class="page-item "> <a href="#" class="page-link">2</a> </li>
                    <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                    <li class="page-item"> <a href="#" class="page-link">4</a> </li>
                    <li class="page-item"> <a href="#" class="page-link">5</a> </li>
                    <li class="page-item"> <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
