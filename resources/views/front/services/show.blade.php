@extends('front.layouts.app')

@section('meta')
    <title>{{ $service->title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $service->summary ?? Str::limit(strip_tags($service->content), 160) }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" 
             style="background-image: url('{{ $service->main_image ? Helpers::image($service->main_image, 'services/') : asset('assets/front/images/homepagebg.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center text-center">
            <h1 class="text-white text-3xl md:text-5xl font-bold tracking-wide px-4">{{ $service->title }}</h1>
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-300">
                    <a href="/" class="hover:text-purple-400">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('front.services.index') }}" class="hover:text-purple-400">Services</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-100">{{ $service->title }}</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- Service Gallery Slider -->
                @if($service->gallery && count(json_decode($service->gallery)) > 0)
                    <div class="mb-8 relative">
                        <div class="swiper serviceGallery">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($service->gallery) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ Helpers::image($image, 'services/') }}" 
                                             alt="{{ $service->title }}"
                                             class="w-full rounded-lg h-[400px] object-cover">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add swiper navigation and pagination -->
                            <div class="swiper-button-next !text-white"></div>
                            <div class="swiper-button-prev !text-white"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                @endif

                <!-- Service Content -->
                <div class="prose prose-lg max-w-none dark:prose-invert mb-8">
                    {!! $service->content !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Service Packages -->
                @if($service->items)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Service Packages</h3>
                        <form id="quoteForm" class="space-y-4">
                            @foreach(json_decode($service->items, true) as $key => $package)
                                <label class="block p-4 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:border-purple-500 transition-colors">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <input type="radio" name="selected_package" value="{{ $key }}" 
                                                   class="w-4 h-4 text-purple-600 border-gray-300 focus:ring-purple-500">
                                            <div class="ml-3">
                                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $package['label'] }}</h4>
                                                <span class="text-purple-600 dark:text-purple-400 font-bold">
                                                    ${{ number_format($package['price'], 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </form>
                    </div>
                @endif

                <!-- Contact Box -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Get Started</h3>
                    <p class="mb-6">Contact us now to learn more about the selected services.</p>
                    <button onclick="submitQuoteRequest()" 
                            class="block w-full text-center bg-white text-purple-600 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                        Request Quote for Selected Packages
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    @include('components.why-choose-us')
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if gallery exists
        if (document.querySelector('.serviceGallery')) {
            const swiper = new Swiper('.serviceGallery', {
                observer: true,
                observeParents: true,
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    type: 'bullets'
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    init: function() {
                        console.log('Swiper initialized successfully');
                    }
                }
            });
        }
    });
    
    // Handle quote request
    function submitQuoteRequest() {
        const form = document.getElementById('quoteForm');
        const selectedPackage = form.querySelector('input[name="selected_package"]:checked');

        if (!selectedPackage) {
            alert('Please select a package');
            return;
        }

        const packageData = @json(json_decode($service->items, true));
        const selectedPackageData = packageData[selectedPackage.value];

        // Add your quote request logic here
        console.log('Selected package:', selectedPackageData);
        // You can redirect to contact form or open modal with selected package
    }
</script>

<style>
    .swiper {
        width: 100%;
        height: 400px;
        border-radius: 0.75rem;
    }
    
    .swiper-slide {
        position: relative;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        background-color: rgba(0, 0, 0, 0.5);
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 18px;
        color: white;
    }
    
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: white;
        opacity: 0.5;
    }
    
    .swiper-pagination-bullet-active {
        opacity: 1;
        background: white;
    }
</style>
@endsection


