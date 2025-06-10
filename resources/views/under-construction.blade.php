@extends('front.layouts.app')

@section('meta_title', "Under Construction")

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="flex flex-col items-center justify-center min-h-[50vh] text-center">
        <div class="mb-8">
            {{-- You can swap this with an SVG or emoji as you like --}}
            <h1 class="text-9xl font-bold text-gray-200 dark:text-gray-800">🚧</h1>
        </div>
        <h2 class="text-3xl font-semibold mb-4 text-gray-800 dark:text-white">We’ll Be Back Soon!</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md">
            Our {{ strtoupper(explode('.', request()->path())[0] ?? 'website') }} section is currently under construction.
            We’re working hard to bring you new features. Thanks for your patience!
        </p>
        <div class="flex gap-4">
            <a href="{{ route('front.index') }}"
               class="bg-primary-gradient text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all duration-300">
                Back to Homepage
            </a>
            <a href="javascript:history.back()"
               class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white px-6 py-3 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
                Go Back
            </a>
        </div>
    </div>
</div>
@endsection
