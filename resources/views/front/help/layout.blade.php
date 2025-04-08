@extends('front.layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-purple-900/50 to-indigo-900/50 backdrop-blur-xl py-16">
    <div class="product-particles absolute inset-0"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
            Help Center
        </h1>
        <div class="flex items-center text-sm text-gray-400">
            <a href="{{ route('front.index') }}" class="hover:text-purple-400">Home</a>
            <span class="mx-2">/</span>
            <span>Help</span>
        </div>
    </div>
</div>

<!-- Navigation Tabs -->
<div class="border-b border-purple-500/20">
    <div class="container mx-auto px-4">
        <nav class="flex space-x-1 overflow-x-auto" aria-label="Tabs">
            @php
                $routes = [
                    ['name' => 'Overview', 'route' => 'front.help.overview', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['name' => 'FAQs', 'route' => 'front.help.faqs', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['name' => 'Guides', 'route' => 'front.help.guides', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['name' => 'Terms', 'route' => 'front.help.terms', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['name' => 'Privacy', 'route' => 'front.help.privacy', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                ];
            @endphp

            @foreach($routes as $item)
            <a href="{{ route($item['route']) }}" 
               class="group relative min-w-0 flex-1 overflow-hidden py-4 px-6 text-center text-sm font-medium hover:bg-purple-500/5 {{ request()->routeIs($item['route']) ? 'text-purple-400 border-b-2 border-purple-400' : 'text-gray-400' }}">
                <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                </svg>
                {{ $item['name'] }}
            </a>
            @endforeach
        </nav>
    </div>
</div>

<!-- Main Content Area -->
<div class="container mx-auto px-4 py-12">
    <div class="card-glow rounded-xl">
        @yield('help-content')
    </div>

    <!-- Discord Support Banner -->
    <div class="mt-8 card-glow rounded-xl p-6 bg-purple-500/5">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-500/10 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Need more help?</h3>
                    <p class="text-gray-400">Get instant help from our support team on Discord</p>
                </div>
            </div>
            <a href="#" class="btn btn-discord">
                Join Discord
            </a>
        </div>
    </div>
</div>
@endsection
