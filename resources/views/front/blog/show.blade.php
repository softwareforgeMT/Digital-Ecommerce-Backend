@extends('front.layouts.app')

@section('meta_title', $post->title )
@section('meta_description', $post->summary ?? Str::limit(strip_tags($post->content), 160)  )


@section('meta')
    <meta name="keywords" content="{{ $post->formatted_tags ?? 'blog, article' }}">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->summary ?? Str::limit(strip_tags($post->content), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $post->photo ? Helpers::image($post->photo, 'blog/') : asset('assets/front/images/homepagebg.jpg') }}">
    <meta property="article:published_time" content="{{ $post->created_at->toISOString() }}">
    <meta property="article:modified_time" content="{{ $post->updated_at->toISOString() }}">
    <meta property="article:section" content="{{ $post->category->name }}">
    @if($post->tags)
        @foreach(json_decode($post->tags, true) as $tag)
            <meta property="article:tag" content="{{ $tag }}">
        @endforeach
    @endif
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->summary ?? Str::limit(strip_tags($post->content), 160) }}">
    <meta name="twitter:image" content="{{ $post->photo ? Helpers::image($post->photo, 'blog/') : asset('assets/front/images/homepagebg.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Article Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "image": "{{ $post->photo ? Helpers::image($post->photo, 'blog/') : asset('assets/front/images/homepagebg.jpg') }}",
        "datePublished": "{{ $post->created_at->toISOString() }}",
        "dateModified": "{{ $post->updated_at->toISOString() }}",
        "author": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/front/images/logo.png') }}"
            }
        },
        "description": "{{ $post->summary ?? Str::limit(strip_tags($post->content), 160) }}",
        "articleBody": "{{ strip_tags($post->content) }}"
    }
    </script>
@endsection

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('{{asset('assets/front/images/homepagebg.jpg')}}');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Details</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('front.blog.index') }}" class="hover:text-purple-600 font-bold">Blog</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">{{ $post->title }}</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- Article Meta -->
                <div class="flex items-center gap-4 mb-6 text-sm text-gray-600 dark:text-gray-400">
                    <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->created_at->format('M d, Y') }}</span>
                    <span><i class="far fa-eye mr-1"></i>{{ $post->views }} views</span>
                    <span><i class="far fa-folder mr-1"></i>{{ $post->category->name }}</span>
                </div>

                <!-- Featured Image -->
                @if($post->photo)
                    <img src="{{ Helpers::image($post->photo, 'blog/') }}" 
                         alt="{{ $post->title }}"
                         class="w-full rounded-xl mb-8">
                @endif

                <!-- Content -->
                <div class="prose prose-lg max-w-none dark:prose-invert mb-8">
                    {!! $post->content !!}
                </div>

                <!-- Tags -->
                @if(!empty($post->tags))
                    <div class="flex flex-wrap gap-3 mb-8">
                        @foreach(json_decode($post->tags,true) as $tag)
                            <x-tag>{{ $tag }}</x-tag>
                        @endforeach
                    </div>
                @endif

                <!-- Related Posts -->
                @if($related->count() > 0)
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-8 mt-8">
                        <h3 class="text-2xl font-bold mb-6 dark:text-white">Related Posts</h3>
                        <div class="grid md:grid-cols-3 gap-6">
                            @foreach($related as $relatedPost)
                                <a href="{{ route('front.blog.show', $relatedPost->slug) }}" 
                                   class="group">
                                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                                        @if($relatedPost->photo)
                                            <img src="{{ Helpers::image($relatedPost->photo, 'blog/') }}" 
                                                 alt="{{ $relatedPost->title }}"
                                                 class="w-full h-40 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h4 class="font-semibold group-hover:text-purple-600 dark:text-white transition-colors">
                                                {{ $relatedPost->title }}
                                            </h4>
                                            <span class="text-sm text-gray-500">
                                                {{ $relatedPost->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4 dark:text-white">Share This Post</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank"
                           class="flex-1 flex items-center justify-center gap-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            <i class="fab fa-facebook-f"></i>
                            <span>Share</span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" 
                           target="_blank"
                           class="flex-1 flex items-center justify-center gap-2 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">
                            <i class="fab fa-twitter"></i>
                            <span>Tweet</span>
                        </a>
                    </div>
                </div>

                <!-- Back to Blog -->
                <a href="{{ route('front.blog.index') }}" 
                   class="block w-full text-center py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Blog
                </a>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    @include('components.why-choose-us')
@endsection
