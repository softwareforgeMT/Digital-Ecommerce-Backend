@extends('front.layouts.app')
@section('css')
@endsection
@section('content')
   

    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('../../assets/homepagebg.jpg');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Category</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Category</span>
                </nav>
            </div>
            <!-- Search Bar -->
            <div class="container mx-auto px-4 md:px-8 mt-4 w-full max-w-lg">
                <div class="relative">
                    <input type="text" placeholder="Search categories..." class="w-full p-3 pl-4 pr-16 text-gray-900 dark:text-white bg-white dark:bg-gray-800 rounded-xl border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <button class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-primary-gradient  text-white px-5 py-2 rounded-xl transition-all">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="text-gray-900 dark:text-white transition-colors duration-300 py-4 md:py-16 lg:py-20 overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Sidebar -->
                <div class="w-full lg:w-1/4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Filter</h2>
                    <div class="w-full h-[2px] bg-gray-300 dark:bg-gray-600 rounded-full mb-4"></div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6 transition-colors duration-300">
                        <h2 class="text-xl font-semibold mb-5 text-gray-800 dark:text-gray-100">Filter</h2>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-5">
                            <h3 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-4">Category</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between group">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="filter1" class="h-4 w-4 text-blue-600 rounded border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition duration-150">
                                        <label for="filter1" class="ml-2.5 text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition duration-150">Filter 1</label>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm font-medium">4</span>
                                </div>
                                <div class="flex items-center justify-between group">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="filter2" class="h-4 w-4 text-blue-600 rounded border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition duration-150">
                                        <label for="filter2" class="ml-2.5 text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition duration-150">Filter 2</label>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm font-medium">4</span>
                                </div>
                                <div class="flex items-center justify-between group">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="filter3" class="h-4 w-4 text-blue-600 rounded border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition duration-150">
                                        <label for="filter3" class="ml-2.5 text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition duration-150">Filter 3</label>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm font-medium">6</span>
                                </div>
                            </div>
                            <button class="mt-6 px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg transition duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Clear type
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="w-full lg:w-3/4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Subcategory</h2>
                    <div class="w-full h-[2px] bg-gray-300 dark:bg-gray-600 rounded-full mb-4"></div>
                    <!-- Grid of Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                        <!-- Card Template (Repeat for each card) -->
                        <?php
                        $cards = [
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],
                            [
                                'img' => '../../assets/brandImage.png',
                                'title' => 'Brand Name',
                            ],

                        ];

                        foreach ($cards as $card): ?>
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md transform hover:-translate-y-1">
                                <div class="p-4 bg-secondary flex items-center justify-center">
                                    <div class="w-full h-36 flex items-center justify-center overflow-hidden">
                                        <img src="<?php echo $card['img']; ?>" alt="Card Image" class="object-contain w-full h-full">
                                    </div>
                                </div>
                                <div class="p-5">

                                    <h3 class="text-center text-gray-900 dark:text-gray-100 font-medium text-lg mb-2 line-clamp-2 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200">
                                        <a href="#"><?php echo $card['title']; ?></a>
                                    </h3>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection