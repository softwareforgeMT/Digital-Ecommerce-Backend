@extends('front.layouts.app')
@section('title')
    @lang('translation.home')
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-900/50 to-indigo-900/50 backdrop-blur-xl py-16">
        <div class="product-particles absolute inset-0"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                        Welcome Back, {{ Auth::user()->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Subscription Status -->
            <div class="card-glow rounded-xl p-6 hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    @php
                        $activeSubscription = Auth::user()->subscriptionsActive();
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs 
                        {{ $activeSubscription ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                        {{ $activeSubscription ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold mb-1">Subscription</h3>
                <p class="text-sm text-gray-400">{{ $activeSubscription ? $activeSubscription->plan->name ?? 'Premium Plan' : 'No Active Plan' }}</p>
            </div>

            <!-- Time Remaining -->
            <div class="card-glow rounded-xl p-6 hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold mb-1">
                    @php
                        $daysLeft = $activeSubscription ? now()->diffInDays($activeSubscription->ends_at, false) : 0;
                    @endphp
                    {{$daysLeft}} Days
                </h3>
                <p class="text-sm text-gray-400">Remaining Time</p>
            </div>

            <!-- Available Games -->
            <a href="{{ route('front.index') }}" class="card-glow rounded-xl p-6 hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold mb-1">Games</h3>
                <p class="text-sm text-gray-400">View Available Games</p>
            </a>

            <!-- Support Access -->
            <a href="{{ route('user.tickets.index') }}" class="card-glow rounded-xl p-6 hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold mb-1">Support</h3>
                <p class="text-sm text-gray-400">24/7 Discord Support</p>
            </a>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Profile Section -->
            <div class="space-y-6">
                <!-- Profile Card -->
                <div class="card-glow rounded-xl overflow-hidden">
                    <div class="p-6">
                        <div class="text-center mb-6">
                            <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}"
                                class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-2 border-purple-400/20"
                                alt="Profile">
                            <h3 class="text-xl font-bold">{{Auth::user()->name}}</h3>
                            <p class="text-gray-400 text-sm">{{Auth::user()->email}}</p>
                        </div>
                        
                        <div class="space-y-3 border-t border-purple-400/10 pt-4 mb-6">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-400">Member Since</span>
                                <span>{{ Carbon\Carbon::parse(Auth::user()->created_at)->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-400">Country</span>
                                <span>{{Auth::user()->country ? Auth::user()->country->country_name : 'Not Set'}}</span>
                            </div>
                        </div>

                        <a href="{{ route('user.account-settings') }}" class="btn btn-primary w-full">
                            Manage Profile
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="card-glow rounded-xl p-6">
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <div class="space-y-3">
                        <a href="{{ route('user.account-settings') }}" class="flex items-center p-3 rounded-lg hover:bg-purple-500/10 transition-colors">
                            <svg class="w-5 h-5 text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Account Settings</span>
                        </a>
                        <a href="{{ route('front.help.overview') }}" class="flex items-center p-3 rounded-lg hover:bg-purple-500/10 transition-colors">
                            <svg class="w-5 h-5 text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Help Center</span>
                        </a>
                        
                    </div>
                </div>
            </div>

            <!-- Game Products Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Available Games -->
                <div class="card-glow rounded-xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Latest Games</h3>
                        <a href="{{ route('front.index') }}" class="text-sm text-purple-400 hover:text-purple-300">View All →</a>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        @forelse($products as $product)
                        <div class="bg-purple-500/10 rounded-lg p-4 border border-purple-400/20 hover:scale-105 transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <img src="{{ Helpers::image($product->image, 'product/') }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-10 h-10 rounded mr-3 object-cover">
                                    <div>
                                        <h4 class="font-bold">{{ $product->name }}</h4>
                                        <p class="text-xs {{ $product->detection_status === 'undetected' ? 'text-green-400' : 'text-red-400' }}">
                                            {{ ucfirst($product->detection_status) }}
                                        </p>
                                    </div>
                                </div>
                                <span class="text-xs {{ $product->status ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }} px-2 py-1 rounded-full">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <a href="{{ route('front.product.details', $product->slug) }}" class="btn btn-primary btn-sm w-full">
                                View Details
                            </a>
                        </div>
                        @empty
                        <div class="col-span-2 text-center py-8">
                            <p class="text-gray-400">No products available</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Discord Join Section -->
                <section class="">
                    <div class="max-w-4xl mx-auto discord-section rounded-2xl p-12 relative overflow-hidden">
                        {{-- <div class="discord-glow"></div> --}}
                        <div class="product-particles"></div>
                                    <!-- Background Shape Image -->
                                    <div class="absolute inset-0 z-0">
                                        <img src="{{asset('assets/front/images/bg-shape.png')}}" alt="Background Shape" class="w-full h-full object-cover opacity-30" />
                                    </div>
                                    
                                    <!-- Background Elements -->
                                    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-blue-900/30 to-transparent z-0"></div>
                                    <div class="absolute top-0 right-0 w-8 h-8 bg-purple-500 rounded-full opacity-20 z-0"></div>
                                    <div class="absolute bottom-12 left-32 w-4 h-4 bg-purple-500 rounded-full opacity-20 z-0"></div>
                                    
                        
                        <!-- Content with proper z-index -->
                        <div class="relative z-10 space-y-8">
                            <!-- Discord Logo -->
                            <div class="flex justify-center">
                                <svg class="w-20 h-20 text-purple-400 discord-icon-glow" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/>
                                </svg>
                            </div>
                            
                            <div class="space-y-4">
                                <h2 class="text-4xl font-bold text-center bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                                    Join the community
                                </h2>
                                <p class="text-center text-gray-400 text-lg max-w-2xl mx-auto">
                                    Join our 450,000+ person community and connect with a more private and decentralized internet. Start for free!
                                </p>
                            </div>
                            
                            <div class="flex justify-center">
                                <button class="btn btn-primary btn-lg">
                                    <i class="fab fa-discord text-xl"></i>
                                    <span>Join Discord</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
