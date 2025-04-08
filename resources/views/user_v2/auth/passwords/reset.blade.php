
{{-- New Design --}}
@extends('front.layouts.app-without-headfooter')
@section('title') Reset Password @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/form.min.css') }}" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('content')
    <!-- ********************************[   ]************************************* -->
    <!-- ********************************[   ]************************************* -->
    <div class="ts-new-wrapper">
        <div class="ts-circle ts-circle-1 ts-circle--xl ts-circle-border"></div>
        <div class="ts-circle ts-circle-2 ts-circle--lg ts-circle-border"></div>
        <div class="ts-circle ts-circle-3 ts-circle--md ts-circle-border"></div>
        <div class="ts-circle ts-circle-4 ts-circle--sm ts-circle-border"></div>
        <div class="container">
            <div class="ts-new-wrapper__inner">

                {{-- <div class="row row-cols-lg-2"> --}}
                <div class="row  row-cols-lg-2">
                    <div>

                        <img class="mt-4 mb-3" src="{{ URL::asset('assets/images/line-dot.svg') }}" alt=""
                            height="8">
                        <h1 class="text-gray fw-semibold mb-3">we have all you need to
                            finding a dream job!</h1>
                        <!-- Swiper -->
                        <div class="swiper  tsRegisterSwiper rounded w-100 ">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < 1; $i++)
                                    <div class="swiper-slide p-3 text-white">
                                        <img class="w-100 "
                                            src="{{ URL::asset('assets/images/login-register/illustration-1.svg') }}"
                                            alt="...">
                                    </div>
                                @endfor

                            </div>
                            <div
                                class="ts-swiper-pagination-2 d-flex justify-content-center  tsRegisterSwiper-swiper-pagination mt-2">
                            </div>
                        </div>


                    </div>
                    <div>


                        

                        <div class="d-flex align-items-center h-100">

                            <div class="ts-form-container w-100">
                                <h1 class="ts-font-poppins ts-heading-02 ts-text-090914 fw-semibold mb-3">
                                    Reset Password
                                </h1>
                                <p class="ts-font-poppins ts-desc-04 mb-09">
                                   Enter Your New Password
                                </p>
                                <div>
                                    
                                    <div class="p-2">
                                        
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user.password.reset.update') }}">
                                        @csrf
                                        @include('includes.alerts')
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="useremail" name="email" placeholder="Enter email"
                                                value="{{ $email ?? $email }}" id="email" {{ $email ? 'readonly' : '' }}>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="userpassword" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Confirm Password</label>
                                            <input id="password-confirm" type="password" name="password_confirmation"
                                                class="form-control" placeholder="Enter confirm password">
                                        </div>

                                        <div class="text-end">
                                            <button class="ts-btn-04 border-0 w-100">Reset</button>
                                        </div>

                                    </form><!-- end form -->



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ********************************[   ]************************************* -->
        <!-- ********************************[   ]************************************* -->
        {{-- Script --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            var registerSwiper = new Swiper(".tsRegisterSwiper", {
                pagination: {
                    el: ".tsRegisterSwiper-swiper-pagination",
                    clickable: true,

                },
            });
        </script>

        {{-- @include('user.auth.includes.modals') --}}
    @endsection
    @section('js')
        <!-- ********************************[ SCRIPT ]************************************* -->
    @endsection
