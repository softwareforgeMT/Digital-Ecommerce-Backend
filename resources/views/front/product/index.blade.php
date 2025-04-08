@extends('front.layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-900/50 to-indigo-900/50 backdrop-blur-xl py-16">
        <div class="product-particles absolute inset-0"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    Gaming Products
                </h1>
                <p class="text-gray-400 text-lg mb-8">
                    Premium gaming enhancements with undetectable implementation
                </p>
            </div>
        </div>
    </div>

    <!-- Products Grid Section -->
    <div class="container mx-auto px-4 py-12">
        {{-- <!-- Filters Bar -->
        <div class="card-glow rounded-xl p-4 mb-8">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <!-- Filter Options -->
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-400">Filter by:</span>
                    <select class="bg-purple-500/5 border border-purple-400/20 rounded-lg px-3 py-1.5 text-sm focus:border-purple-400 focus:outline-none">
                        <option value="all">All Games</option>
                        <option value="fps">FPS Games</option>
                        <option value="battle-royale">Battle Royale</option>
                    </select>
                    <select class="bg-purple-500/5 border border-purple-400/20 rounded-lg px-3 py-1.5 text-sm focus:border-purple-400 focus:outline-none">
                        <option value="all">Status</option>
                        <option value="undetected">Undetected</option>
                        <option value="detected">Detected</option>
                    </select>
                </div>

                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" 
                           placeholder="Search products..." 
                           class="w-64 bg-purple-500/5 border border-purple-400/20 rounded-lg pl-10 pr-4 py-2 text-sm focus:border-purple-400 focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div> --}}

        <!-- Products Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($data as $product)
               @include('front.product.includes.product-card')
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-purple-500/5 rounded-xl p-8 border border-purple-400/20">
                        <svg class="w-16 h-16 text-purple-400/50 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/>
                        </svg>
                        <p class="text-gray-400 text-lg">No products available at the moment</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{-- @if($product->hasPages())
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @endif --}}
    </div>
@endsection
