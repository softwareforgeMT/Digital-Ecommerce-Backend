@extends('front.layouts.app-without-headfooter')
@section('title') Verify @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/form.min.css') }}" />
@endsection
@section('content')
    <!-- ********************************[   ]************************************* -->


    <div class="d-flex flex-xl-row flex-column ts-max-width ts-sign-up-sec">
        @include('user.auth.includes.sidebar')

        <div class="ts-flex-center w-xl-50 w-100 ts-bg-fff">
            <div class="tab-content" id="myTabContent">

                <div id="login" role="tabpanel" aria-labelledby="login-tab" tabindex="0"
                    class="tab-pane fade show active">
                    <div class="ts-flex-center w-xl-50 w-100 ts-bg-fff ts-signup-p-block">
                        <div class="ts-sign-up-form m-auto">
                            <div class="p-2 mt-4">
                                <div class="text-muted text-center mb-4 mx-lg-3">
                                    <h4 class="">Verify Your Email</h4>
                                    <p>Please enter the 4 digit code sent to <span
                                            class="fw-semibold">example@abc.com</span></p>
                                </div>

                                <form action="{{ route('user.login') }}" method="POST">
                                    @include('includes.alerts')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="verification" class="form-label">Verification code</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            value="" id="verification" name="email"
                                            placeholder="Enter Verification Code">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </form>

                                <div class="mt-3">
                                    <button type="button" class="btn btn-success w-100">Confirm</button>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <p class="mb-0">Didn't receive a code ? <a href="auth-pass-reset-basic"
                                        class="fw-semibold text-primary text-decoration-underline">Resend</a> </p>
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

@endsection
