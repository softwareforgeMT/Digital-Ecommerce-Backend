@extends('front.layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-purple-900/50 to-indigo-900/50 backdrop-blur-xl py-16">
    <div class="product-particles absolute inset-0"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
            About OP Vault
        </h1>
        <div class="flex items-center text-sm text-gray-400">
            <a href="{{ route('front.index') }}" class="hover:text-purple-400">Home</a>
            <span class="mx-2">/</span>
            <span>About Us</span>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
    <!-- Vision & Mission -->
    <div class="grid md:grid-cols-2 gap-8 mb-16">
        <div class="card-glow rounded-xl p-8">
            <div class="bg-purple-500/10 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
            <p class="text-gray-400">To revolutionize the gaming experience by providing cutting-edge technology and unmatched security, while fostering a thriving community of passionate gamers.</p>
        </div>

        <div class="card-glow rounded-xl p-8">
            <div class="bg-purple-500/10 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
            <p class="text-gray-400">To deliver premium gaming enhancements with undetectable implementation, backed by robust security measures and exceptional 24/7 customer support.</p>
        </div>
    </div>

    <!-- Core Values -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold mb-8 text-center bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">Our Core Values</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Innovation -->
            <div class="card-glow rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Innovation</h3>
                </div>
                <p class="text-gray-400">Continuously pushing boundaries to develop advanced gaming solutions.</p>
            </div>

            <!-- Security -->
            <div class="card-glow rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Security</h3>
                </div>
                <p class="text-gray-400">Prioritizing user safety with robust security measures and regular updates.</p>
            </div>

            <!-- Community -->
            <div class="card-glow rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Community</h3>
                </div>
                <p class="text-gray-400">Building and supporting a thriving community of passionate gamers.</p>
            </div>
        </div>
    </div>


    <!-- Join Discord Banner -->
    <div class="card-glow rounded-xl p-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
        <p class="text-gray-400 mb-6">Connect with our team and community members on Discord</p>
        <a href="#" class="btn btn-discord">
            <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
            </svg>
            Join Discord
        </a>
    </div>
</div>
@endsection
