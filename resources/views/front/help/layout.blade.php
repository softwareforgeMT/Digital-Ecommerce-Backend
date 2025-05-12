@extends('front.layouts.app')

@section('content')
  <!-- Hero Section -->
  <div class="relative bg-gradient-to-r from-purple-200 to-indigo-200 dark:from-purple-900/50 dark:to-indigo-900/50 backdrop-blur-xl py-16">
    <div class="product-particles absolute inset-0"></div>
    <div class="container mx-auto px-4 relative z-10">
      <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
        Help Center
      </h1>
      <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
        <a href="{{ route('front.index') }}" class="hover:text-purple-400">Home</a>
        <span class="mx-2">/</span>
        <span>Help</span>
      </div>
    </div>
  </div>

  <!-- Navigation Tabs -->
  <div class="border-b border-gray-200 dark:border-purple-500/20">
    <div class="container mx-auto px-4">
      <nav class="flex space-x-1 overflow-x-auto" aria-label="Tabs">
        @php
          $routes = [
            ['name'=>'Overview','route'=>'front.help.overview','icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['name'=>'FAQs','route'=>'front.help.faqs','icon'=>'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['name'=>'Warranty', 'route'=>'front.help.warranty', 'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['name'=>'Guides','route'=>'front.help.guides','icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
            ['name'=>'Terms','route'=>'front.help.terms','icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['name'=>'Privacy','route'=>'front.help.privacy','icon'=>'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
          ];
        @endphp

        @foreach($routes as $item)
          <a href="{{ route($item['route']) }}"
             class="group relative flex-1 py-4 px-6 text-center text-sm font-medium
                    text-gray-700 hover:bg-purple-100
                    dark:text-gray-400 dark:hover:bg-purple-500/5
                    {{ request()->routeIs($item['route'])
                       ? 'text-purple-600 border-b-2 border-purple-600 dark:text-purple-400 dark:border-purple-400'
                       : '' }}">
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


</div>
@endsection
