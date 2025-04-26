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

    <!-- Main Section -->
    <section class="text-gray-900 dark:text-white transition-colors duration-300 overflow-hidden mb-4 md:mb-10">
        <div class="w-full bg-black text-white px-4 md:px-24 py-4 flex flex-wrap items-center justify-between">
            <!-- Left side: Filter and View Toggle -->
            <div class="flex items-center space-x-6">
                <!-- Filter Button -->
                <button class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span class="text-lg">Filter</span>
                </button>

                <!-- View Toggle Buttons -->
                <div class="flex items-center space-x-4">
                    <!-- Grid View Button -->
                    <button class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h4v4H4V4zm6 0h4v4h-4V4zm6 0h4v4h-4V4zm-12 6h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4zm-12 6h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4z" />
                        </svg>
                    </button>

                    <!-- List View Button -->
                    <button class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                        </svg>
                    </button>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-gray-600"></div>

                <!-- Results Count -->
                <span class="text-sm md:text-base">Showing 1–16 of 32 results</span>
            </div>

            <!-- Right side: Sort Controls -->
            <div class="flex items-center space-x-4 mt-2 md:mt-0">
                <span class="text-sm md:text-base">Show</span>

                <!-- Items Per Page Dropdown -->
                <div class="relative">
                    <select class="bg-black text-white border border-gray-700 rounded px-2 py-1 appearance-none pr-8 focus:outline-none focus:border-white">
                        <option>16</option>
                        <option>32</option>
                        <option>48</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>

                <span class="text-sm md:text-base">Short by</span>

                <!-- Sort Dropdown -->
                <div class="relative">
                    <select class="bg-black text-white border border-gray-700 rounded px-2 py-1 appearance-none pr-8 focus:outline-none focus:border-white">
                        <option>Default</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Products -->
        <?php
        $products = [
            [
                "id" => 1,
                "name" => "Gaming PC - RTX 4070",
                "desc" => "High-performance gaming PC with an Intel i7 processor and NVIDIA RTX 4070 GPU, ideal for AAA gaming.",
                "price" => "$1500 - $2000",
                "discount" => 10,
                "img" => "https://images.unsplash.com/photo-1587302912306-cf1ed9c33146?q=80&w=1960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ],
            [
                "id" => 2,
                "name" => "PlayStation 5",
                "desc" => "Next-gen PlayStation 5 console with ultra-fast SSD, ray tracing support, and an immersive gaming experience.",
                "price" => "$499 - $599",
                "discount" => 5,
                "img" => "https://images.unsplash.com/photo-1678761442615-5af77170f925?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ],
            [
                "id" => 3,
                "name" => "Xbox Series X",
                "desc" => "Powerful Xbox Series X console with 4K gaming, 120FPS support, and Game Pass access.",
                "price" => "$499 - $599",
                "discount" => 8,
                "img" => "https://images.unsplash.com/photo-1632312527375-bd5d5a0d3484?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ],
            [
                "id" => 4,
                "name" => "iPhone 15 Pro Max",
                "desc" => "Latest iPhone 15 Pro Max with A17 Bionic chip, ProMotion display, and advanced camera system.",
                "price" => "$1099 - $1299",
                "discount" => 6,
                "img" => "https://images.unsplash.com/photo-1736173155834-6cd98d8dc9fe?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ],
        ];
        ?>

        <div class="overflow-hidden text-gray-800 dark:text-white transition-all duration-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 pb-4 md:pb-20">
                <!-- Products Grid -->
                <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($products as $index => $product) : ?>
                        <!-- Product Card with animation classes -->
                        <div class="product-card transform translate-y-8 transition-all duration-700 ease-out bg-white dark:bg-gray-800 bg-opacity-80 dark:bg-opacity-30 backdrop-filter backdrop-blur-lg rounded-2xl overflow-hidden group h-[450px] shadow-xl hover:shadow-2xl hover:scale-[1.02]" data-delay="<?= $index * 100 ?>">
                            <!-- Product Image -->
                            <div class="h-[250px] w-full overflow-hidden">
                                <img src="<?= $product["img"] ?>" alt="<?= $product["name"] ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>

                            <!-- Product Info -->
                            <div class="p-6 flex flex-col flex-grow">
                                <h2 class="text-xl font-bold mb-2 text-black dark:text-white"><?= $product["name"] ?></h2>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-3"><?= $product["desc"] ?></p>
                                <div class="mt-auto flex justify-between items-end">
                                    <div>
                                        <span class="text-xl font-bold block mb-1 text-gray-800 dark:text-white"><?= $product["price"] ?></span>
                                        <span class="text-xs text-gray-500 dark:text-gray-300">Max Discount: $<?= $product["discount"] ?></span>
                                    </div>

                                </div>
                            </div>

                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-600 to-pink-600 bg-opacity-90 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500 p-6">
                                <!-- button -->
                                <a href="#" class="mb-4 w-full">
                                    <button class="w-full bg-white text-purple-800 hover:bg-purple-100 py-3 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </a>
                                <!-- button -->
                                <a href="./detailed-product.php" class="mb-6 w-full">
                                    <button class="w-full bg-white text-purple-800 hover:bg-purple-100 py-3 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                                        <!-- New Relevant SVG (Document Icon for Product Details) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-6 4h8M5 4v16a2 2 0 002 2h10a2 2 0 002-2V4a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                                        </svg>
                                        <span>View Product Details</span>
                                    </button>
                                </a>

                                <div class="flex justify-center space-x-6 w-full">
                                    <button class="flex flex-col items-center text-white hover:text-pink-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span class="text-xs font-medium">Wishlist</span>
                                    </button>
                                    <button class="flex flex-col items-center text-white hover:text-pink-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span class="text-xs font-medium">Compare</span>
                                    </button>
                                    <button class="flex flex-col items-center text-white hover:text-pink-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                        </svg>
                                        <span class="text-xs font-medium">Share</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center">
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

    <!-- Why choose us -->
    <section>
        <div class="bg-secondary dark:bg-gray-800 py-12 px-4 mb-10">
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
                        <h3 class="text-xl font-bold">High Quality</h3>
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