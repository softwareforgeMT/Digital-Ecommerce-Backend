@extends('front.layouts.app')
@section('title') Sign Up @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/form.min.css') }}" />
    {{-- <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" /> --}}


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
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="swiper-slide p-3 text-white">
                                        <img class="w-100 "
                                            src="{{ URL::asset('assets/images/login-register/login'.($i).'.png') }}"
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
                        <div>

                            <div class="d-flex justify-content-center gap-3 fs-3 fw-bold mb-3">
                                <a class="text-primary text-decoration-underline " href="{{ route('user.register') }}">Sign
                                    Up</a>
                                <span class="text-black">
                                    Or
                                </span>
                                <a class="text-black" href="{{ route('user.login') }}">Sign In</a>
                            </div>
                            <div class="ts-form-container w-100">

                                <div>

                                    <form method="POST" action="{{ route('user.register') }}"
                                        enctype="multipart/form-data">
                                        @include('includes.alerts')
                                        @csrf
                                        <div class=" ts-form-control--icon ts-form-control--icon-user"
                                            data-image-url="{{ URL::asset('assets/images/bg-auth.jpg') }}">
                                            {{-- <label for="usernameSignup"
                                            class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">User
                                            name</label> --}}
                                            <input type="text" name="name" class="form-control ts-form-control "
                                                id="usernameSignup" required placeholder="username" />
                                        </div>
                                        <div class=" ts-form-control--icon ts-form-control--icon-envelope">
                                            {{-- <label for="emailAddressSignup"
                                            class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Email
                                            address</label> --}}
                                            <input type="email" name="email" class="form-control ts-form-control"
                                                id="emailAddressSignup" required placeholder="email" />
                                        </div>
                                        <div class=" ts-form-control--icon ts-form-control--icon-lock">
                                            {{-- <label for="passwordSignup"
                                            class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Password</label> --}}
                                            <input type="password" name="password" class="form-control ts-form-control"
                                               id="password-input" required placeholder="password" />

                                            <button class="btn btn-link position-absolute end-0 bottom-0 fs-16 text-decoration-none text-muted" type="button" id="password-addon" onclick="togglePasswordVisibility()"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        <div class=" ts-form-control--icon mb-3 ts-form-control--icon-lock">
                                            {{-- <label for="confirmPasswordSignup"
                                            class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Confirm
                                            Password</label> --}}
                                            <input type="password" name="password_confirmation"
                                                class="form-control ts-form-control" id="confirmPasswordSignup" required
                                                placeholder="repeat password" />
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input ts-focus-1" type="checkbox" value=""
                                                    id="defaultCheck1" required />
                                                <label class="form-check-label" for="defaultCheck1">
                                                   By registering you agree to the
                                                        {{$gs->name}} <a target="_blank" href="{{route('front.page',\App\Models\Page::find(2)->slug)}}"
                                                            class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                            of Service</a>
                                                </label>


                                            </div>

                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="ts-btn-04 border-0 px-5 mx-auto">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="ts-center-border mb-4">
                                        <a class="ts-font-manrope ts-center-border-desc ts-text-4b5768 ts-desc-06 ts-fw-medium text-center"
                                            href="#">
                                            or sign up with
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <ul class="nav ts-form-social-btn">
                                            @if ($gs->google_login == 1)
                                                <li>
                                                    <a href="{{ url('oauth/google') }}"><i class="bi bi-google"></i> </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('oauth/google') }}"><i
                                                            class="bi bi-google"></i> Google</a>
                                                </li> --}}
                                            @endif
                                            @if ($gs->wechat_login == 1)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        <i class="bi fab fa-apple"></i> Wechat</a>
                                                </li>
                                            @endif
                                            @if ($gs->facebook_login == 1)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ url('oauth/facebook') }}"><i
                                                            class="bi bi-facebook"></i>
                                                        Facebook</a>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div>
                                        <p class="ts-font-poppins ts-desc-06 ts-text-64748b text-center mb-0">
                                            Have an account?

                                            <a class="ts-link ts-text-primary-light ts-fw-medium text-decoration-underline"
                                                href="{{ route('user.login') }}"> Log In Now
                                            </a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var registerSwiper = new Swiper(".tsRegisterSwiper", {
            pagination: {
                el: ".tsRegisterSwiper-swiper-pagination",
                clickable: true,

            },
            autoplay: {
                delay: 2000,  // This means each slide will be shown for 2.5 seconds
                disableOnInteraction: false,  // This will allow autoplay to continue after user interactions (like swipe)
            },
        });
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password-input');
            var passwordAddon = document.getElementById('password-addon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordAddon.innerHTML = '<i class="ri-eye-off-fill align-middle"></i>';
            } else {
                passwordInput.type = 'password';
                passwordAddon.innerHTML = '<i class="ri-eye-fill align-middle"></i>';
            }
        }
    </script>
    {{-- Script --}}

    @include('user.auth.includes.modals')
@endsection
@section('js')
   
@endsection
