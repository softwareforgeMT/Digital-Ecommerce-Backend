@extends('front.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/front/pages/pricing.min.css') }}" />
@endsection
@section('content')
    <div class="ts-pricing-page pt-lg-12 pt-10 pb-lg-12 pb-10">
      <div class="container">
        <div class="ts-price-header pb-11">
          <h4 class="ts-text-191D23 ts-font-dm-sans fw-bold ts-heading-04">
            Powerful features for
            <span> powerful creators</span>
          </h4>
          <p class="ts-font-dm-sans ts-desc-03 ts-text-191D23 mb-lg-11 mb-08">
            Choose a plan that’s right for you
          </p>

          <div class="d-flex align-items-center justify-content-center">
            <p class="mb-0 ts-text-191D23 ts-font-dm-sans ts-desc-05">
              Pay Monthly
            </p>
            <div class="form-check form-switch ts-form-switch">
              <input
                class="form-check-input ts-form-check-input-switch ts-focus-0"
                type="checkbox"
                role="switch"
                id="flexSwitchCheckChecked"
              />
            </div>
            <p class="mb-0 ts-text-191D23 ts-font-dm-sans ts-desc-05">
              Pay Yearly
            </p>
          </div>
        </div>
        <div class="ts-price-card-group">
          <!-- PRICINIG CARD NO 1 -->
          <div class="ts-price-card">
            <div>
              <p
                class="ts-text-191D23 ts-font-manrope fw-bold ts-desc-01 mb-03"
              >
                Freebie
              </p>
              <p class="ts-font-manrope ts-desc-05 ts-text-64748b mb-06">
                Ideal for individuals who need quick access to basic features.
              </p>
              <div class="d-flex align-items-center mb-06">
                <h2
                  class="m-0 ts-heading-02 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  $0
                </h2>
                <p
                  class="m-0 ps-2 ts-text-4b5768 ts-font-manrope ts-text-05 fw-light"
                >
                  / Month
                </p>
              </div>
            </div>
            <div class="mb-lg-08 mb-06">
              <a href="#" class="ts-price-card-btn-1">Get Started Now</a>
            </div>
            <div>
              <ul class="nav ts-pack-list ts-gap-12">
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Access to 100 million
                  stock images
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Upload custom icons and fonts
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Unlimited Sharing
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Upload graphics & video in up to
                  4k
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Unlimited Projects
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Instant Access to our design
                  system
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Create teams to collaborate on
                  designs
                </li>
              </ul>
            </div>
          </div>
          <!-- PRICINIG CARD NO 2 -->
          <div class="ts-price-card ts-bg-primary-light">
            <div>
              <p class="ts-text-fff ts-font-manrope fw-bold ts-desc-01 mb-03">
                Professional
              </p>
              <p class="ts-font-manrope ts-desc-05 ts-text-fff mb-06">
                Ideal for individuals who who need advanced features and tools
                for client work.
              </p>
              <div class="d-flex align-items-center mb-06">
                <h2
                  class="m-0 ts-heading-02 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  $25
                </h2>
                <p
                  class="m-0 ps-2 ts-text-fff ts-font-manrope ts-text-05 fw-light"
                >
                  / Month
                </p>
              </div>
            </div>
            <div class="mb-lg-08 mb-06">
              <a href="#" class="ts-price-card-btn-2">Get Started Now</a>
            </div>
            <div>
              <ul class="nav ts-gap-12 ts-pack-list">
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Access to 100 million
                  stock images
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Upload custom icons and
                  fonts
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Unlimited Sharing
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Upload graphics & video
                  in up to 4k
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>Unlimited Projects
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Instant Access to our design
                  system
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-fff ts-fw-medium"
                >
                  <i class="ts-x-1 bi bi-x"></i>Create teams to collaborate on
                  designs
                </li>
              </ul>
            </div>
          </div>
          <!-- PRICINIG CARD NO 3 -->
          <div class="ts-price-card">
            <div>
              <p
                class="ts-text-191D23 ts-font-manrope fw-bold ts-desc-01 mb-03"
              >
                Enterprise
              </p>
              <p class="ts-font-manrope ts-desc-05 ts-text-64748b mb-06">
                Ideal for individuals who need quick access to basic features.
              </p>
              <div class="d-flex align-items-center mb-06">
                <h2
                  class="m-0 ts-heading-02 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  $100
                </h2>
                <p
                  class="m-0 ps-2 ts-text-4b5768 ts-font-manrope ts-text-05 fw-light"
                >
                  / Month
                </p>
              </div>
            </div>
            <div class="mb-lg-08 mb-06">
              <a href="#" class="ts-price-card-btn-1">Get Started Now</a>
            </div>
            <div>
              <ul class="nav ts-gap-12 ts-pack-list">
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
                <li
                  class="nav-item ts-desc-05 ts-font-manrope ts-text-191D23 ts-fw-medium"
                >
                  <i class="ts-check-1 bi bi-check2"></i>20,000+ of PNG & SVG
                  graphics
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
