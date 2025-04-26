@extends('front.layouts.app')
@section('css')
@endsection
@section('content')
   
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('../../assets/homepagebg.jpg');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Hot Topics</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Topics</span>
                </nav>
            </div>
        </div>
    </section>

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
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Topics</h2>
                    <div class="w-full h-[2px] bg-gray-300 dark:bg-gray-600 rounded-full mb-4"></div>
                    <!-- Grid of Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                        <!-- Card Template (Repeat for each card) -->
                        <?php
                        $cards = [
                            [
                                'img' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1590845947376-2638caa89309?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1672906674630-67866460f965?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1580327344181-c1163234e5a0?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1564216329574-c839d4eedb1b?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1551033541-2075d8363c66?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],
                            [
                                'img' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'title' => 'The State of U.S. Early-Stage Venture & Startups: 2Q23',
                                'description' => 'AngelList and Brex proprietary data and analysis of early-stage venture and startup activity in 2Q23.'
                            ],


                        ];

                        foreach ($cards as $card): ?>
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md transform hover:-translate-y-1">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700 flex items-center justify-center">
                                    <div class="w-full h-36 flex items-center justify-center overflow-hidden">
                                        <img src="<?php echo $card['img']; ?>" alt="Card Image" class="object-contain w-full h-full">
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="mb-3">
                                        <a href="./detailed-hot-topic.php" class="text-purple-600 dark:text-purple-400 text-xs font-semibold tracking-wide uppercase hover:text-purple-700 dark:hover:text-purple-300 transition duration-200">Report</a>
                                    </div>
                                    <h3 class="text-gray-900 dark:text-gray-100 font-medium text-lg mb-2 line-clamp-2 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200">
                                        <a href="./detailed-hot-topic.php"><?php echo $card['title']; ?></a>
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3"><?php echo $card['description']; ?></p>
                                    <a href="./detailed-hot-topic.php" class="text-blue-600 dark:text-blue-400 text-sm font-medium flex items-center group">
                                        <span class="group-hover:mr-1 transition-all duration-200">Read the report</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5 group-hover:translate-x-1 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-16">
                        <nav class="inline-flex shadow-md rounded-lg overflow-hidden">
                            <a href="#" class="px-5 py-3 bg-primary text-white text-sm font-medium transition-colors duration-300">1</a>
                            <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300">2</a>
                            <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300">3</a>
                            <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300 group flex items-center">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection