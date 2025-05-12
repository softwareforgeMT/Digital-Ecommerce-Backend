@extends('front.layouts.app')
@section('meta_title') Reset Password @endsection

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
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Reset Password</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Create a new password for your account</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/20 dark:border-white/10 p-8">
            <form action="{{ route('user.password.reset.update') }}" method="POST">
                @include('includes.alerts')
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Input -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" 
                           class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                  focus:outline-none focus:border-purple-500/40"
                           placeholder="Enter your email"
                           {{ $email ? 'readonly' : '' }} />
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">New Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password-input"
                               class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               placeholder="Enter new password" />
                        <button type="button" 
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-300" 
                                onclick="togglePasswordVisibility('password-input', 'password-toggle-icon')">
                            <i class="ri-eye-fill align-middle" id="password-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="confirm-password-input"
                               class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-purple-500/40"
                               placeholder="Confirm new password" />
                        <button type="button" 
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-300" 
                                onclick="togglePasswordVisibility('confirm-password-input', 'confirm-password-toggle-icon')">
                            <i class="ri-eye-fill align-middle" id="confirm-password-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-primary-gradient text-white px-4 py-3 rounded-lg flex items-center gap-2 hover:shadow-lg transition-all duration-300 group justify-center">
                    <span class="relative flex items-center justify-center">
                        Reset Password
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
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
