@extends('front.layouts.app-without-headfooter')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/form.min.css') }}" />
@endsection
@section('content')
    <!-- ********************************[   ]************************************* -->
    <!-- button style [common.scss line #340] -->
    <div class="ts-form-toggle-button">
        <ul class="nav ts-nav-tabs nav-tabs border-0 shadow" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="sign-up-tab" data-bs-toggle="tab" data-bs-target="#sign-up" type="button"
                    role="tab" aria-controls="sign-up" aria-selected="true">
                    Sing Up
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button"
                    role="tab" aria-controls="login" aria-selected="false">
                    Log In
                </button>
            </li>
        </ul>
    </div>

    <div class="d-flex flex-xl-row flex-column ts-max-width ts-sign-up-sec">
        <div class="ts-flex-center d-none d-xl-flex w-xl-50 w-100 ts-bg-primary-light ts-signup-p-block ts-circle-form">
            <div class="ts-sign-up-wel m-auto">
                <a class="mb-4 d-inline-block" href="./index.html">
                    <img width="158" loading="lazy" src="{{ asset('assets/images/front/img/logo-white-large.svg') }}"
                        alt="..." />
                </a>
                <h1 class="ts-heading-01 ts-font-poppins ts-text-fff fw-semibold mb-4 ts-letter-2">
                    Welcome to our community
                </h1>
                <p class="ts-desc-04 ts-text-d0d5dd ts-font-poppins mb-3">
                    AP Team gives you the course and data you need to create a truly
                    professional website.
                </p>
                <div class="mb-3">
                    <img class="w-100 rounded-3" loading="lazy" src="{{ asset('assets/images/front/img/dollar.jpg') }}"
                        alt="..." />
                </div>
                <ul class="nav gap-2 mb-4">
                    <li class="nav-item">
                        <img width="23" loading="lazy" src="{{ asset('assets/images/front/icon/golden-star.svg') }}"
                            alt="..." />
                    </li>
                    <li class="nav-item">
                        <img width="23" loading="lazy" src="{{ asset('assets/images/front/icon/golden-star.svg') }}"
                            alt="..." />
                    </li>
                    <li class="nav-item">
                        <img width="23" loading="lazy" src="{{ asset('assets/images/front/icon/golden-star.svg') }}"
                            alt="..." />
                    </li>
                    <li class="nav-item">
                        <img width="23" loading="lazy" src="{{ asset('assets/images/front/icon/golden-star.svg') }}"
                            alt="..." />
                    </li>
                    <li class="nav-item">
                        <img width="23" loading="lazy" src="{{ asset('assets/images/front/icon/golden-star.svg') }}"
                            alt="..." />
                    </li>
                </ul>
                <p class="ts-font-poppins ts-desc-02 ts-text-fff mb-4">
                    "We love AP Team Our designers were using it for their projects, so
                    we already knew what kind of design they want."
                </p>
                <div class="d-flex">
                    <div class="me-3">
                        <img width="44" loading="lazy" src="{{ asset('assets/images/front/img/co.png') }}"
                            alt="..." />
                    </div>
                    <div>
                        <p class="ts-font-poppins fw-semibold ts-desc-05 ts-text-fff mb-0">
                            Faye
                        </p>
                        <p class="ts-font-poppins ts-desc-06 ts-text-d0d5dd">
                            Co-Founder, AP Team.co
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ts-flex-center w-xl-50 w-100 ts-bg-fff">
            <div class="tab-content" id="myTabContent">
                <div id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab" tabindex="0" class="tab-pane fade">
                    <div class="ts-flex-center w-xl-50 w-100 ts-bg-fff ts-signup-p-block">
                        <div class="ts-sign-up-form m-auto">
                            <h1 class="ts-font-poppins ts-heading-02 ts-text-090914 fw-semibold mb-3">
                                APE Team
                            </h1>
                            <p class="ts-font-poppins ts-desc-04 mb-09">
                                AP Team gives you the course and data you need to create a
                                truly professional website.
                            </p>
                            <div>
                                <div class="mb-3">
                                    <label for="usernameSignup"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">User
                                        name</label>
                                    <input type="text" class="form-control" id="usernameSignup" />
                                </div>
                                <div class="mb-3">
                                    <label for="emailAddressSignup"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Email
                                        address</label>
                                    <input type="email" class="form-control" id="emailAddressSignup" />
                                </div>
                                <div class="mb-07">
                                    <label for="passwordSignup"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Password</label>
                                    <input type="password" class="form-control" id="passwordSignup" />
                                </div>
                                <div class="mb-07">
                                    <label for="confirmPasswordSignup"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="confirmPasswordSignup" />
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input ts-focus-1" type="checkbox" value=""
                                            id="defaultCheck1" />
                                        <label class="form-check-label" for="defaultCheck1">
                                            I agree all statements terms of services
                                        </label>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="mb-4">
                                    <a href="#" class="ts-btn-04">Sign Up</a>
                                </div>
                                <div class="ts-center-border mb-4">
                                    <a class="ts-font-manrope ts-center-border-desc ts-text-4b5768 ts-desc-06 ts-fw-medium text-center"
                                        href="#">
                                        or sign up with
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <ul class="nav ts-form-social-btn">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="bi bi-google"></i> Google</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="bi fab fa-apple"></i> Apple</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="bi bi-facebook"></i>
                                                Facebook</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="ts-font-poppins ts-desc-06 ts-text-64748b text-center mb-0">
                                        Already have an account?
                                        <span id="alreadyHaveAnAccount"
                                            class="ts-link ts-text-primary-light ts-fw-medium">Create free account</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="login" role="tabpanel" aria-labelledby="login-tab" tabindex="0"
                    class="tab-pane fade show active">
                    <div class="ts-flex-center w-xl-50 w-100 ts-bg-fff ts-signup-p-block">
                        <div class="ts-sign-up-form m-auto">
                            <h1 class="ts-font-poppins ts-heading-02 ts-text-090914 fw-semibold mb-3">
                                APE Team
                            </h1>
                            <p class="ts-font-poppins ts-desc-04 mb-09">
                                AP Team gives you the course and data you need to create a
                                truly professional website.
                            </p>
                            <div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Email
                                        address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label ts-font-poppins ts-fw-medium ts-desc-05 ts-text-090914 mb-03">Password</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput2" />
                                </div>

                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input ts-focus-1" type="checkbox" value=""
                                            id="defaultCheck1" />
                                        <label class="form-check-label" for="defaultCheck1">
                                            Default checkbox
                                        </label>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="mb-4">
                                    <a href="#" class="ts-btn-04">Login</a>
                                </div>
                                <div class="ts-center-border mb-4">
                                    <a class="ts-font-manrope ts-center-border-desc ts-text-4b5768 ts-desc-06 ts-fw-medium text-center"
                                        href="#">
                                        or sign up with
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <ul class="nav ts-form-social-btn">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="bi bi-google"></i> Google</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="bi fab fa-apple"></i> Apple</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="bi bi-facebook"></i>
                                                Facebook</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="ts-font-poppins ts-desc-06 ts-text-64748b text-center mb-0">
                                        Don't have an account?
                                        <a class="ts-link ts-text-primary-light ts-fw-medium" href="./signup.html">Create
                                            free account</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- ********************************[ SCRIPT ]************************************* -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script>
        $("#alreadyHaveAnAccount").click(function() {
            activaTab("pane_login");
        });

        function tsActiveTab(tsActiveTabSlide) {
            console.log(tsActiveTabSlide);
        }
    </script>
@endsection
