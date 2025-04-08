@extends('front.layouts.app')

@section('content')
<div class="min-h-[80vh] relative flex items-center">
    <!-- Background Effects -->
    <div class="hero-glow opacity-30"></div>
    <div class="product-particles absolute inset-0"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Error Code -->
            <h1 class="text-[150px] font-bold leading-none bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                404
            </h1>
            
            <!-- Error Message -->
            <h2 class="text-3xl font-bold mb-6">Page Not Found</h2>
            <p class="text-gray-400 mb-8">
                The page you are looking for might have been removed, had its name changed, 
                or is temporarily unavailable.
            </p>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('front.index') }}" class="btn btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Back to Home
                </a>
                
                <a href="{{ route('front.help.overview') }}" class="btn btn-secondary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Visit Help Center
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
