@extends('front.layouts.app')

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('{{asset('assets/front/images/homepagebg.jpg')}}');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Store</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Store</span>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main section -->
    <section class="text-gray-900 dark:text-white transition-colors duration-300 py-4 md:py-16 lg:py-20 overflow-hidden container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex justify-center">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-3">Category</h2>
                <div class="w-full h-[3px] bg-gray-300 dark:bg-gray-600 rounded-full mb-10"></div>
                
                <!-- Grid Cards -->
                @php
                    $cards = [
                        [
                            'img' => asset('assets/front/images/store/category1.jpg'),
                            'title' => 'Category Name',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                        ],
                        [
                            'img' => asset('assets/front/images/store/category2.jpg'),
                            'title' => 'Category Name',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                        ],
                        [
                            'img' => asset('assets/front/images/store/category3.jpg'),
                            'title' => 'Category Name',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                    @foreach($cards as $card)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md transform hover:-translate-y-1">
                            <div class="p-4 bg-white flex items-center justify-center">
                                <div class="w-full h-36 flex items-center justify-center overflow-hidden">
                                    <img src="{{ $card['img'] }}" alt="Card Image" class="object-contain w-full h-full">
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class=" text-gray-900 dark:text-gray-100 font-medium text-lg mb-2 line-clamp-2 transition duration-200">
                                    <a href="#">{{ $card['title'] }}</a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">{{ $card['description'] }}</p>
                                <a href="./store-subcategory.php">
                                    <!-- button -->
                                    <button class="bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:shadow-lg transition-all duration-300 group">
                                        <span>Store</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Why choose us -->
    <section>
        <div class="bg-secondary dark:bg-gray-800 py-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 py-2 md:p-8">
                <!-- High Quality Feature -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold ">High Quality</h3>
                        <p class="text-gray-500 dark:text-gray-300">crafted from top materials</p>
                    </div>
                </div>

                <!-- Warranty Protection Feature -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Warranty Protection</h3>
                        <p class="text-gray-500 dark:text-gray-300">Over 2 years</p>
                    </div>
                </div>

                <!-- Free Shipping Feature -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16m8 0h3a2 2 0 002-2v-4a2 2 0 00-2-2h-3v8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Free Shipping</h3>
                        <p class="text-gray-500 dark:text-gray-300">Order over 150 $</p>
                    </div>
                </div>

                <!-- 24/7 Support Feature -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 11a4 4 0 108 0 4 4 0 00-8 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">24 / 7 Support</h3>
                        <p class="text-gray-500 dark:text-gray-300">Dedicated support</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection