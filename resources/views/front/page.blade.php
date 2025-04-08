@extends('front.layouts.app')
@section('title') 
    {{ $page->title }}
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-900/50 to-indigo-900/50 backdrop-blur-xl py-16">
        <div class="product-particles absolute inset-0"></div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                {{ $page->title }}
            </h1>
            <div class="flex items-center text-sm text-gray-400">
                <a href="{{ route('front.index') }}" class="hover:text-purple-400">Home</a>
                <span class="mx-2">/</span>
                <span>{{ $page->title }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Legal Pages (Terms, Privacy) -->
            @if(in_array($page->id, ['2', '3']))
                <div class="card-glow rounded-xl overflow-hidden">
                    <!-- Header -->
                    <div class="relative overflow-hidden bg-purple-500/5 p-8 border-b border-purple-500/20">
                        {{-- <div class="product-particles absolute inset-0"></div> --}}
                        <div class="relative z-10">
                            <h2 class="text-2xl font-bold mb-2">{{ $page->title }}</h2>
                            <p class="text-gray-400">Last updated: {{ \Carbon\Carbon::parse($page->updated_at)->format('F d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 space-y-6 prose prose-invert max-w-none">
                        {!! $page->details !!}
                    </div>
                </div>

            <!-- About Page -->
            @elseif($page->id == 1)
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Company Image -->
                    <div class="card-glow rounded-xl overflow-hidden">
                        <img src="{{asset('/images/nina.png')}}" alt="Company Image" class="w-full h-full object-cover">
                    </div>

                    <!-- Company Info -->
                    <div class="card-glow rounded-xl p-6">
                        <h2 class="text-2xl font-bold mb-4">{{$gs->name}}</h2>
                        <p class="text-gray-400">
                            At {{$gs->name}} we specialize in providing premium gaming enhancements with a focus on security and reliability. Our mission is to deliver undetectable and high-quality products to our gaming community.
                        </p>
                    </div>

                    <!-- Additional Info -->
                    <div class="card-glow rounded-xl p-6">
                        <h2 class="text-2xl font-bold mb-4">Our Values</h2>
                        <ul class="space-y-3 text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Security First
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                24/7 Support
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Regular Updates
                            </li>
                        </ul>
                    </div>
                </div>

            <!-- Other Pages -->
            @else
                <div class="card-glow rounded-xl overflow-hidden">
                    <div class="p-8 prose prose-invert max-w-none">
                        {!! $page->details !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('css')
<style>
    /* Prose Styles for Content */
    .prose {
        color: #94a3b8;
    }
    .prose h1, .prose h2, .prose h3, .prose h4 {
        color: white;
        margin-top: 2em;
        margin-bottom: 1em;
    }
    .prose p {
        margin-top: 1.25em;
        margin-bottom: 1.25em;
    }
    .prose a {
        color: #A78BFA;
        text-decoration: none;
    }
    .prose a:hover {
        color: #8B5CF6;
    }
    .prose ul {
        list-style-type: disc;
        padding-left: 1.5em;
    }
    .prose li {
        margin-top: 0.5em;
        margin-bottom: 0.5em;
    }
</style>
@endsection