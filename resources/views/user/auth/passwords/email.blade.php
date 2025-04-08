@extends('front.layouts.app')
@section('title') Forgot Password @endsection

@section('content')
<div class="relative min-h-screen py-20">
    <div class="hero-glow opacity-30"></div>
    
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    Forgot Password?
                </h1>
                <p class="text-gray-400">Enter your email to reset your password</p>
            </div>

            <!-- Form Card -->
            <div class="card-glow rounded-xl backdrop-blur-sm p-8">
                <!-- Alert -->
                <div class="bg-purple-500/10 border border-purple-500/20 rounded-lg p-4 mb-6">
                    <p class="text-sm text-gray-300">
                        Enter your email address and we'll send you instructions to reset your password.
                    </p>
                </div>

                <form action="{{ route('user.forgot.submit') }}" method="POST">
                    @include('includes.alerts')
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               placeholder="Enter your email" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full mb-6">
                        Send Reset Link
                    </button>

                    <!-- Back to Login -->
                    <p class="text-center text-sm text-gray-400">
                        Remember your password? 
                        <a href="{{ route('user.login') }}" 
                           class="text-purple-400 hover:text-purple-300">
                            Back to login
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
