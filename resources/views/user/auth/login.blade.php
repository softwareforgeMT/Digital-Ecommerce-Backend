@extends('front.layouts.app')
@section('title') Sign In @endsection

@section('content')
<div class="relative min-h-screen py-20">
    <div class="hero-glow opacity-30"></div>
    
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    Welcome Back
                </h1>
                <p class="text-gray-400">Sign in to continue to your account</p>
            </div>

            <!-- Login Form Card -->
            <div class="card-glow rounded-xl backdrop-blur-sm p-8">
                <form action="{{ route('user.login') }}" method="POST">
                    @include('includes.alerts')
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                          focus:outline-none focus:border-purple-500/40"
                                   placeholder="Enter your email"
                                   autocomplete="email" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   id="password-input"
                                   class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                          focus:outline-none focus:border-purple-500/40"
                                   placeholder="Enter your password" />
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-300" 
                                    onclick="togglePasswordVisibility()">
                                <i class="ri-eye-fill align-middle" id="password-toggle-icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" value="1" 
                                   class="w-4 h-4 rounded border-purple-500/20 text-purple-500 
                                          focus:ring-purple-500 focus:ring-offset-0 bg-purple-500/5"/>
                            <span class="ml-2 text-sm text-gray-400">Remember me</span>
                        </label>
                        <a href="{{ route('user.forgot') }}" 
                           class="text-sm text-purple-400 hover:text-purple-300">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full mb-6">
                        Sign In
                    </button>

                    <!-- Social Login Divider -->
                    <div class="relative text-center mb-6">
                        <span class="px-3 bg-dark-purple relative z-10 text-sm text-gray-400">
                            or continue with
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

                    <!-- Sign Up Link -->
                    <p class="text-center text-sm text-gray-400">
                        Don't have an account? 
                        <a href="{{ route('user.register') }}" 
                           class="text-purple-400 hover:text-purple-300">
                            Sign up now
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@include('user.auth.includes.modals')
@push('scripts')
<script>
function togglePasswordVisibility() {
    const input = document.getElementById('password-input');
    const icon = document.getElementById('password-toggle-icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('ri-eye-fill', 'ri-eye-off-fill');
    } else {
        input.type = 'password';
        icon.classList.replace('ri-eye-off-fill', 'ri-eye-fill');
    }
}
</script>
@endpush
@endsection