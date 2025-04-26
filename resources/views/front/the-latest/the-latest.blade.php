@extends('front.layouts.app')

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('{{asset('assets/front/images/homepagebg.jpg')}}');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">The Latest</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">The Latest</span>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="relative text-gray-900 dark:text-white transition-colors duration-300 py-0 md:py-16 overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Heading -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-3xl md:text-5xl font-bold text-black dark:text-white inline-block">
                    Our Featured Services
                </h1>
                <p class="text-center text-gray-700 dark:text-gray-300 mt-4 text-lg max-w-2xl mx-auto leading-relaxed">
                    We offer a wide range of services to help you achieve your business goals. Explore our top-notch offerings below.
                </p>
                <!-- Decorative line -->
                <div class="flex items-center justify-center mt-6">
                    <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
                    <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
                    <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- First Product Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="{{asset('assets/front/images/products/PCS.png')}}" alt="Gaming PC Cases"
                            class="w-full h-64 object-cover object-center transition-transform duration-700 group-hover:scale-110">
                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 text-white">
                                <span class="px-3 py-1 bg-blue-500 rounded-full text-xs font-semibold">Featured</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-300 mb-3 gap-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Admin</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>11 Oct 2024</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span>Wood</span>
                            </div>
                        </div>
                        <h2 class="text-xl font-bold group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">Premium Gaming PC Cases</h2>
                        <p class="text-gray-600 dark:text-gray-300 mt-3 text-sm leading-relaxed flex-grow">
                            High-quality wooden PC cases designed for gamers who appreciate both aesthetics and performance.
                        </p>

                        <!-- button -->
                        <div class="mt-6">
                            <a href="./detailed-the-latest.php" class="group inline-flex items-center px-8 py-4 rounded-xl bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                Read more
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Second Product Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="{{asset('assets/front/images/products/console.png')}}" alt="Gaming PC Cases"
                            class="w-full h-64 object-cover object-center transition-transform duration-700 group-hover:scale-110">
                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 text-white">
                                <span class="px-3 py-1 bg-blue-500 rounded-full text-xs font-semibold">New</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-300 mb-3 gap-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Admin</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>11 Oct 2024</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span>Handmade</span>
                            </div>
                        </div>
                        <h2 class="text-xl font-bold group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">Custom Gaming Console</h2>
                        <p class="text-gray-600 dark:text-gray-300 mt-3 text-sm leading-relaxed flex-grow">
                            Handcrafted gaming consoles with premium materials and cutting-edge technology.
                        </p>

                        <!-- button -->
                        <div class="mt-6">
                            <a href="./detailed-the-latest.php" class="group inline-flex items-center px-8 py-4 rounded-xl bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                Read more
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Third Product Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="{{asset('assets/front/images/products/theLatestConsole.png')}}" alt="Gaming PC Cases"
                            class="w-full h-64 object-cover object-center transition-transform duration-700 group-hover:scale-110">
                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 text-white">
                                <span class="px-3 py-1 bg-blue-500 rounded-full text-xs font-semibold">Popular</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-300 mb-3 gap-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Admin</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>11 Oct 2024</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span>Wood</span>
                            </div>
                        </div>
                        <h2 class="text-xl font-bold group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">Next-Gen Gaming Controller</h2>
                        <p class="text-gray-600 dark:text-gray-300 mt-3 text-sm leading-relaxed flex-grow">
                            Ergonomic wooden controllers designed for comfort during extended gaming sessions.
                        </p>

                        <!-- button -->
                        <div class="mt-6">
                            <a href="./detailed-the-latest.php" class="group inline-flex items-center px-8 py-4 rounded-xl bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                Read more
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
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
    </section>

    <!-- Why Choose Us -->
    <section class="relative overflow-hidden text-gray-900 dark:text-white transition-colors duration-300">
        <div class="py-16 md:py-24 relative z-10">
            <div class="container mx-auto px-4">
                <!-- Section Title -->
                <div class="text-center mb-12 transform transition-all duration-700 hover:scale-105">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <h1 class="text-3xl md:text-5xl font-bold text-black dark:text-white inline-block">
                            Why Choose Us
                        </h1>
                        <!-- Decorative line -->
                        <div class="flex items-center justify-center mt-6">
                            <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
                            <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
                            <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
                        </div>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

                        <!-- High Quality Feature -->
                        <div class="bg-white dark:bg-indigo-900/30 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0 mr-4 p-3 rounded-lg bg-amber-50 group-hover:bg-amber-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-500 transform transition-transform duration-500 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white group-hover:text-amber-600 transition-colors duration-300">High Quality</h3>
                                    <p class="text-gray-500 dark:text-gray-300 mt-1">Crafted from top materials</p>
                                </div>
                            </div>
                            <div class="pl-16 text-gray-600 dark:text-gray-300 transition-colors duration-300">
                                <p>We source only the finest materials to ensure durability and satisfaction with every product.</p>
                            </div>
                        </div>

                        <!-- Warranty Protection Feature -->
                        <div class="bg-white dark:bg-indigo-900/30 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0 mr-4 p-3 rounded-lg bg-blue-50 group-hover:bg-blue-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500 transform transition-transform duration-500 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white group-hover:text-blue-600 transition-colors duration-300">Warranty Protection</h3>
                                    <p class="text-gray-500 dark:text-gray-300 mt-1">Over 2 years</p>
                                </div>
                            </div>
                            <div class="pl-16 text-gray-600 dark:text-gray-300  transition-colors duration-300">
                                <p>Our extended warranty ensures your purchase is protected for years to come.</p>
                            </div>
                        </div>

                        <!-- Free Shipping Feature -->
                        <div class="bg-white dark:bg-indigo-900/30 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0 mr-4 p-3 rounded-lg bg-green-50 group-hover:bg-green-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500 transform transition-transform duration-500 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white group-hover:text-green-600 transition-colors duration-300">Free Shipping</h3>
                                    <p class="text-gray-500 dark:text-gray-300 mt-1">Order over $150</p>
                                </div>
                            </div>
                            <div class="pl-16 text-gray-600 dark:text-gray-300  transition-colors duration-300">
                                <p>Enjoy complimentary shipping on all qualifying orders with no hidden fees.</p>
                            </div>
                        </div>

                        <!-- 24/7 Support Feature -->
                        <div class="bg-white dark:bg-indigo-900/30 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0 mr-4 p-3 rounded-lg bg-purple-50 group-hover:bg-purple-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-purple-500 transform transition-transform duration-500 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white group-hover:text-purple-600 transition-colors duration-300">24/7 Support</h3>
                                    <p class="text-gray-500 dark:text-gray-300 mt-1">Dedicated assistance</p>
                                </div>
                            </div>
                            <div class="pl-16 text-gray-600 dark:text-gray-300  transition-colors duration-300">
                                <p>Our support team is always available to help with any questions or concerns.</p>
                            </div>
                        </div>
                    </div>

                    <!-- button -->
                    <div class="mt-10 flex justify-center items-center">
                        <a href="#" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                            Explore all services
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection