@extends('front.layouts.app')
@section('title') Sign Up @endsection

@section('content')
<div class="relative min-h-screen py-20">
    <div class="hero-glow opacity-30"></div>
    
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    Create Account
                </h1>
                <p class="text-gray-400">Join our gaming community today</p>
            </div>

            <!-- Register Form Card -->
            <div class="card-glow rounded-xl backdrop-blur-sm p-8">
                <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
                    @include('includes.alerts')
                    @csrf

                    <!-- Username Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                        <input type="text" name="name" required
                               class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               placeholder="Choose a username" />
                    </div>

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                        <input type="email" name="email" required
                               class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               placeholder="Enter your email" />
                    </div>

                    <!-- Password Fields -->
                    <div class="mb-6">
                        <div class=" ts-form-control--icon ts-form-control--icon-lock">
                            <input type="password" name="password" class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               id="password-input" required placeholder="password" />

                            <button class="btn btn-link position-absolute end-0 bottom-0 fs-16 text-decoration-none text-muted" type="button" id="password-addon" onclick="togglePasswordVisibility()"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                        <div class=" ts-form-control--icon mb-3 ts-form-control--icon-lock">
                            <input type="password" name="password_confirmation"
                                class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40" id="confirmPasswordSignup" required
                                placeholder="repeat password" />
                        </div>
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" required
                                   class="w-4 h-4 rounded border-purple-500/20 text-purple-500 
                                          focus:ring-purple-500 focus:ring-offset-0 bg-purple-500/5"/>
                            <span class="ml-2 text-sm text-gray-400">
                                I agree to the 
                                <a href="{{ route('front.help.terms') }}" 
                                   class="text-purple-400 hover:text-purple-300">
                                    Terms of Service
                                </a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full mb-6">
                        Create Account
                    </button>

                    <div class="relative text-center mb-6">
                        <span class="px-3 bg-dark-purple relative z-10 text-sm text-gray-400">
                            or sign up with
                        </span>
                        <div class="absolute top-1/2 w-full h-px bg-gradient-to-r from-transparent via-purple-500/20 to-transparent -z-1"></div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="mb-6">
                        @if ($gs->google_login == 1)
                            <a href="{{ url('oauth/google') }}" 
                               class="w-full flex items-center justify-center space-x-3 py-3 px-4 
                                      bg-white/5 hover:bg-white/10 
                                      border border-purple-500/20 hover:border-purple-500/30 
                                      backdrop-blur-sm rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5" viewBox="0 0 24 24">
                                    <path fill="#EA4335" d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z"/>
                                    <path fill="#34A853" d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z"/>
                                    <path fill="#4A90E2" d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z"/>
                                    <path fill="#FBBC05" d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z"/>
                                </svg>
                                <span>Continue with Google</span>
                            </a>
                        @endif
                    </div>

                    <!-- Sign In Link -->
                    <p class="text-center text-sm text-gray-400">
                        Already have an account? 
                        <a href="{{ route('user.login') }}" 
                           class="text-purple-400 hover:text-purple-300">
                            Sign in
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@include('user.auth.includes.modals')
@endsection
