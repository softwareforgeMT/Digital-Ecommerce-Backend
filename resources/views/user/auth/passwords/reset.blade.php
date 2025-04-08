@extends('front.layouts.app')
@section('title') Reset Password @endsection

@section('content')
<div class="relative min-h-screen py-20">
    <div class="hero-glow opacity-30"></div>
    
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    Reset Password
                </h1>
                <p class="text-gray-400">Create a new password for your account</p>
            </div>

            <!-- Form Card -->
            <div class="card-glow rounded-xl backdrop-blur-sm p-8">
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
                    <button type="submit" class="btn btn-primary w-full">
                        Reset Password
                    </button>
                </form>
            </div>
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
