@extends('front.layouts.app')

@section('meta')
    <title>Blog - {{ config('app.name') }}</title>
    <meta name="description" content="Explore our latest insights, guides, and tech stories about computer nostalgia, services, and products">
    <meta name="keywords" content="blog, tech articles, computer nostalgia, tech guides">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Blog - {{ config('app.name') }}">
    <meta property="og:description" content="Explore our latest insights, guides, and tech stories">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/front/images/homepagebg.jpg') }}">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog - {{ config('app.name') }}">
    <meta name="twitter:description" content="Explore our latest insights, guides, and tech stories">
    <meta name="twitter:image" content="{{ asset('assets/front/images/homepagebg.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('{{asset('assets/front/images/homepagebg.jpg')}}');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Blog</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Blog</span>
                </nav>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- Search Bar -->
                <div class="mb-8">
                    <form action="{{ route('front.blog.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="search" 
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600"
                               placeholder="Search articles..." 
                               value="{{ request('search') }}">
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Blog Posts Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    @forelse($posts as $post)
                        @include('front.blog.includes.blog-card')
                    @empty
                        <div class="col-span-2 text-center py-12">
                            <h3 class="text-xl text-gray-600 dark:text-gray-400">No posts found</h3>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    @include('front.partials.pagination', ['paginator' => $posts])
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Categories -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <a href="{{ route('front.blog.index', ['category' => $category->slug]) }}" 
                               class="flex items-center justify-between py-2 px-3 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 
                                      {{ request('category') == $category->slug ? 'bg-purple-50 dark:bg-purple-900 text-purple-600 dark:text-purple-400' : 'text-gray-700 dark:text-gray-300' }}">
                                <span>{{ $category->name }}</span>
                                <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full text-sm">
                                    {{ $category->blogs_count }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Featured Posts -->
                @if($featured->count() > 0)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Featured Posts</h3>
                        <div class="space-y-4">
                            @foreach($featured as $post)
                                <a href="{{ route('front.blog.show', $post->slug) }}" 
                                   class="flex items-start gap-4 group">
                                    @if($post->photo)
                                        <img src="{{ Helpers::image($post->photo, 'blog/') }}" 
                                             alt="{{ $post->title }}"
                                             class="w-20 h-20 rounded-lg object-cover">
                                    @endif
                                    <div>
                                        <h4 class="font-medium text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                            {{ $post->title }}
                                        </h4>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    @include('components.why-choose-us')
@endsection