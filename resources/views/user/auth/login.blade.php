@extends('front.layouts.app')
@section('meta_title') Sign In @endsection

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
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                Welcome Back
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Sign in to continue to your account</p>
        </div>

        <!-- Login Form Card -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/20 dark:border-white/10 p-8">
            <form action="{{ route('user.login') }}" method="POST" class="space-y-6">
                @include('includes.alerts')
                @csrf

                <!-- Email Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-2">Email Address</label>
                    <div class="relative group">
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500
                                      focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                      transition duration-200 group-hover:border-purple-500/50"
                               placeholder="Enter your email" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 dark:text-gray-500">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-2">Password</label>
                    <div class="relative group">
                        <input type="password" name="password" id="password-input" required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500
                                      focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                      transition duration-200 group-hover:border-purple-500/50"
                               placeholder="Enter your password" />
                        <button type="button" onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500 hover:text-purple-400">
                            <i class="ri-eye-fill align-middle" id="password-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" value="1"
                               class="w-4 h-4 rounded border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-gray-800 text-purple-500 focus:ring-purple-500 focus:ring-offset-0" />
                        <span class="ml-2 text-sm text-gray-900 dark:text-gray-300">Remember me</span>
                    </label>
                    <a href="{{ route('user.forgot') }}" 
                       class="text-sm text-purple-400 hover:text-purple-300 transition duration-200">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-primary-gradient text-white px-4 py-3 rounded-lg flex items-center gap-2 hover:shadow-lg transition-all duration-300 group justify-center">
                    <span class="relative flex items-center justify-center">
                        Sign In
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                </button>

                <!-- Social Login Divider -->
                <div class="relative text-center">
                    <span class="px-3 bg-gray-50 dark:bg-gray-900 relative z-10 text-sm text-gray-600 dark:text-gray-400">
                        or continue with
                    </span>
                    <div class="absolute top-1/2 w-full h-px bg-gradient-to-r from-transparent via-purple-500/20 to-transparent -z-1"></div>
                </div>

                <!-- Social Login Buttons -->
                <div>
                    @if ($gs->google_login == 1)
                        <a href="{{ url('oauth/google') }}" 
                           class="w-full flex items-center justify-center space-x-3 py-3 px-4 
                                  bg-white/5 hover:bg-white/10 
                                  border border-purple-500/20 hover:border-purple-500/30 
                                  backdrop-blur-sm rounded-lg transition-all duration-300 
                                  hover:-translate-y-1 hover:shadow-lg
                                  text-gray-700 dark:text-gray-300">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#EA4335" d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z"/>
                                <path fill="#34A853" d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z"/>
                                <path fill="#4A90E2" d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z"/>
                                <path fill="#FBBC05" d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z"/>
                            </svg>
                            <span>Continue with Google</span>
                        </a>
                    @endif
                    
                   <a href="{{ url('oauth/discord') }}" 
                       class="mt-4 w-full flex items-center justify-center space-x-3 py-3 px-4 
                              bg-white/5 hover:bg-white/10 
                              border border-blue-500/20 hover:border-blue-500/30 
                              backdrop-blur-sm rounded-lg transition-all duration-300 
                              hover:-translate-y-1 hover:shadow-lg
                              text-gray-700 dark:text-gray-300">
                        <i class="fab fa-discord text-indigo-500 w-5 h-5"></i>
                        <span>Continue with Discord</span>
                    </a>
                   
                </div>

                <!-- Sign Up Link -->
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account? 
                    <a href="{{ route('user.register') }}" 
                       class="text-purple-400 hover:text-purple-300 transition duration-200">
                        Sign up now
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@include('user.auth.includes.modals')
@section('script')
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
@endsection
@endsection