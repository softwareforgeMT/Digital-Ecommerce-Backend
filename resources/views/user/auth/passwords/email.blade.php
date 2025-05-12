@extends('front.layouts.app')
@section('meta_title') Forgot Password @endsection

@section('content')
<div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Glowing background effects -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute left-[40%] top-[20%] w-[500px] h-[500px] bg-purple-500/30 dark:bg-purple-500/20 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 animate-blob"></div>
        <div class="absolute right-[40%] bottom-[20%] w-[500px] h-[500px] bg-blue-500/30 dark:bg-blue-500/20 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative w-full max-w-md space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Forgot Password?</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Enter your email to reset your password</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/20 dark:border-white/10 p-8">
            <!-- Info Alert -->
            <div class="bg-purple-500/10 dark:bg-purple-500/5 border border-purple-500/20 rounded-lg p-4 mb-6">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Enter your email address and we'll send you instructions to reset your password.
                </p>
            </div>

            <form action="{{ route('user.forgot.submit') }}" method="POST" class="space-y-6">
                @include('includes.alerts')
                @csrf

                <!-- Email Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                    <div class="relative group">
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-700 
                                      bg-white dark:bg-gray-800 text-gray-900 dark:text-white 
                                      placeholder-gray-500 dark:placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                      transition duration-200 group-hover:border-purple-500/50"
                               placeholder="Enter your email" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-primary-gradient text-white px-4 py-3 rounded-lg flex items-center gap-2 hover:shadow-lg transition-all duration-300 group justify-center">
                    <span class="relative flex items-center justify-center">
                        Send Reset Link
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                </button>

                <!-- Back to Login -->
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    Remember your password? 
                    <a href="{{ route('user.login') }}" 
                       class="text-purple-500 hover:text-purple-400 transition duration-200">
                        Back to login
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
