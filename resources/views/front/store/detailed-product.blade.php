@extends('front.layouts.app')

@section('content')
    <!-- Product Details Section -->
    <section class="bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 py-12 md:py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Breadcrumb Navigation -->
            <div class="flex items-center text-sm mb-8 bg-white dark:bg-gray-800 px-4 py-2 rounded-lg shadow-sm">
                <a href="/" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">Home</a>
                <span class="mx-2 text-gray-400 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">Shop</a>
                <span class="mx-2 text-gray-400 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span class="text-indigo-600 dark:text-indigo-400 font-medium">Item Name</span>
            </div>

            <!-- Product Display -->
            <div class="flex flex-col lg:flex-row gap-10 bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <!-- Product Images Section -->
                <div class="w-full lg:w-1/2 p-6">
                    <!-- Main Product Image -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-6 rounded-xl shadow-md mb-6 overflow-hidden group">
                        <img id="main-image" src="{{asset('assets/front/images/products/product1.jpg')}}"
                            alt="Product"
                            class="w-full h-auto object-cover rounded-lg transform group-hover:scale-105 transition-transform duration-500 ease-in-out">
                    </div>

                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-4 gap-4">
                        <!-- Thumbnail images using asset() helper -->
                        @foreach(['thumb1.jpg', 'thumb2.jpg', 'thumb3.jpg', 'thumb4.jpg'] as $thumb)
                            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow-sm cursor-pointer hover:shadow-md transition-all duration-300 border-2 border-transparent hover:border-indigo-500 dark:hover:border-indigo-400">
                                <img src="{{asset('assets/front/images/products/' . $thumb)}}"
                                    alt="Thumbnail"
                                    class="w-full h-auto rounded-md"
                                    onclick="document.getElementById('main-image').src = this.src">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="w-full lg:w-1/2 p-8 md:p-10 flex flex-col">
                    <div class="flex-1">
                        <!-- Product Title & Rating -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Item Name</h1>

                            <!-- Rating -->
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <span class="ml-2 text-gray-600 dark:text-gray-300">5 Customer Reviews</span>
                            </div>

                            <!-- Product Description -->
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet massa at tortor faucibus, eget faucibus lacus pulvinar. Suspendisse potenti. In nisi sapien, dignissim vel dolor nec, euismod tempus metus.
                            </p>
                        </div>

                        <!-- Options Dropdown -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4 cursor-pointer flex items-center justify-between" onclick="toggleDropdown()">
                                Options
                                <svg id="dropdownIcon" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </h3>

                            <div id="optionsMenu" class="space-y-3 max-h-0 overflow-hidden transition-all duration-300">
                                <label class="flex items-center p-3 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                    <input type="radio" name="option" class="form-radio h-5 w-5 text-indigo-600 dark:text-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                                    <span class="ml-3 text-gray-600 dark:text-gray-300">Option 1</span>
                                </label>

                                <label class="flex items-center p-3 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                    <input type="radio" name="option" class="form-radio h-5 w-5 text-indigo-600 dark:text-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                                    <span class="ml-3 text-gray-600 dark:text-gray-300">Option 2</span>
                                </label>

                                <label class="flex items-center p-3 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                    <input type="radio" name="option" class="form-radio h-5 w-5 text-indigo-600 dark:text-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                                    <span class="ml-3 text-gray-600 dark:text-gray-300">Option 3</span>
                                </label>
                            </div>
                        </div>

                        <!-- JavaScript for Toggle -->
                        <!-- Page ky end p hy -->

                    </div>

                    <!-- Purchase Section -->
                    <div class="mt-auto space-y-6">
                        <!-- Regular Price -->
                        <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <span class="text-lg font-medium text-gray-700 dark:text-gray-200">Regular Price</span>
                            <span class="text-2xl font-bold text-gray-800 dark:text-white">$ 500</span>
                        </div>

                        <!-- Quantity and Add to Cart -->
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <div class="flex items-center border-2 border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden shadow-sm">
                                <button class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <input type="text" class="w-14 text-center bg-transparent text-gray-700 dark:text-gray-300 border-x-2 border-gray-300 dark:border-gray-600 py-2 font-medium" value="1">
                                <button class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <button class="flex-1 bg-white dark:bg-gray-700 border-2 border-black dark:border-white text-black dark:text-white font-medium px-4 py-3 rounded-lg shadow-sm hover:shadow-md transition duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Add To Cart
                            </button>
                        </div>

                        <!-- Discounted Price -->
                        <div class="flex items-center justify-between pt-4 border-t-2 border-gray-200 dark:border-gray-700">
                            <span class="text-lg font-medium text-gray-700 dark:text-gray-200">Lowest price using your bits</span>
                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">$ 300</span>
                        </div>

                        <!-- Additional Buttons -->
                        <div class="flex space-x-4 justify-center items-center">
                            <!-- button -->
                            <button class="flex-1 max-w-48 text-center bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300 group">
                                Add to wishlist
                            </button>
                            <button class="flex-1 max-w-48 text-center bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300 group">
                                Warranty information
                            </button>
                        </div>


                    </div>

                    <!-- Product Details -->
                    <div class="space-y-3 mt-8 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="flex">
                            <span class="w-24 font-medium text-gray-700 dark:text-gray-200">SKU</span>
                            <span class="text-gray-600 dark:text-gray-300">: SS001</span>
                        </div>
                        <div class="flex">
                            <span class="w-24 font-medium text-gray-700 dark:text-gray-200">Category</span>
                            <span class="text-gray-600 dark:text-gray-300">: Item name</span>
                        </div>
                        <div class="flex">
                            <span class="w-24 font-medium text-gray-700 dark:text-gray-200">Tags</span>
                            <span class="text-gray-600 dark:text-gray-300">: Mobile, PCs, Console</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Product Details Tab Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Tabs Navigation -->
            <div class="flex flex-wrap justify-center md:justify-start border-b border-gray-300 dark:border-gray-700 mb-8">
                <button class="w-full md:w-auto px-6 py-3 font-medium text-gray-800 dark:text-white border-b-2 border-indigo-600 dark:border-indigo-400 text-center">
                    Description
                </button>
                <button class="w-full md:w-auto px-6 py-3 font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-center">
                    Additional Information
                </button>
                <button class="w-full md:w-auto px-6 py-3 font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-center">
                    Reviews [5]
                </button>
            </div>


            <!-- Tab Content -->
            <div class="mb-16">
                <!-- Description Content -->
                <div class="space-y-6">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet varius risus eu faucibus. Maecenas ut fringilla ante, id dictum eros.
                    </p>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet varius risus eu faucibus. Maecenas ut fringilla ante, id dictum eros. Fusce lacus nisi, sollicitudin ut varius nec, venenatis eu justo. In varius efficitur lacus et tristique. Quisque egestas neque tellus ut molestie ipsum gravida nec. In faucibus, nulla ut sollicitudin tempor, nunc metus finibus purus, eu pretium ante quam vitae quam. Aliquam nec tellus ut dolor tristique congue.
                    </p>

                    <!-- Product Images -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Product Image 1" class="w-full h-auto object-cover" />
                        </div>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Product Image 2" class="w-full h-auto object-cover" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div>
                <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-10">Related Products</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Product Card 1 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Item Name" class="w-full h-auto" />
                            <div class="absolute top-3 right-3">
                                <button class="bg-white dark:bg-gray-800 p-2 rounded-full shadow-md hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">Item Name</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Item Description</p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold text-gray-800 dark:text-white">$110 - $500</span>
                                <span class="text-gray-500 dark:text-gray-400 line-through text-sm">$1000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Item Name" class="w-full h-auto" />
                            <div class="absolute top-3 right-3">
                                <button class="bg-white dark:bg-gray-800 p-2 rounded-full shadow-md hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">Item Name</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Item Description</p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold text-gray-800 dark:text-white">$110 - $500</span>
                                <span class="text-gray-500 dark:text-gray-400 line-through text-sm">$1000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Item Name" class="w-full h-auto" />
                            <div class="absolute top-3 right-3">
                                <button class="bg-white dark:bg-gray-800 p-2 rounded-full shadow-md hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">Item Name</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Item Description</p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold text-gray-800 dark:text-white">$110 - $500</span>
                                <span class="text-gray-500 dark:text-gray-400 line-through text-sm">$1000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1610473068745-cf5589c24f77?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Item Name" class="w-full h-auto" />
                            <div class="absolute top-3 right-3">
                                <button class="bg-white dark:bg-gray-800 p-2 rounded-full shadow-md hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">Item Name</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Item Description</p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="font-bold text-gray-800 dark:text-white">$110 - $500</span>
                                <span class="text-gray-500 dark:text-gray-400 line-through text-sm">$1000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Show More Button -->
                <div class="flex justify-center mt-8">
                    <!-- button -->
                    <button class="flex-1 max-w-48 text-center bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300 group">
                        Add to wishlist
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/front/js/detailed-product-options-dropdown.js')}}"></script>
@endsection