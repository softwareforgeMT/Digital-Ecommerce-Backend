@extends('front.layouts.app')
@section('css')
@endsection
@section('content')
   
  <!-- Hero Section -->
  <section class="relative h-[70vh] md:h-screen overflow-hidden bg-gray-50 dark:bg-gray-900">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
      style="background-image: url({{asset('assets/front/images/homepagebg.jpg')}});">
      <!-- Dark Overlay for Better Readability -->
      <div class="absolute inset-0 bg-black/40 dark:bg-black/60"></div>
    </div>

    <!-- Content Container -->
    <div class="z-10 relative h-full container mx-auto px-4 md:px-6 flex items-center">
      <div class="max-w-xl">
        <!-- Badge -->
        <span class="inline-block px-5 py-2 rounded-full bg-purple-100 bg-opacity-50 dark:bg-purple-800 dark:bg-opacity-50 text-black dark:text-white text-sm font-medium mb-4 border border-transparent dark:border-pink-500 dark:border-opacity-30 shadow-sm">
          {{ $heroSection->badge_text }}
        </span>

        <!-- Heading -->
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-down">
          {{ $heroSection->heading_text }}
          <span class="relative">
            <span class="text-transparent bg-primary-gradient bg-clip-text">
              {{ $heroSection->heading_highlight }}
            </span>
          </span>
        </h1>

        <!-- Description -->
        <p class="text-gray-200 mt-6 text-lg max-w-2xl mx-auto leading-relaxed mb-4">
          {{ $heroSection->description }}
        </p>

        <!-- Button -->
        <a href="{{ $heroSection->button_link }}" class="relative inline-flex items-center">
          <button class="bg-primary-gradient text-white font-bold py-3 px-10 rounded-full transition-all duration-300 transform hover:-translate-y-2">
            <span class="relative flex items-center">
              {{ $heroSection->button_text }}
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </span>
          </button>
        </a>
      </div>
    </div>
  </section>

  <!-- Featured Products Section -->
  <section class="relative bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-300 flex flex-col items-center py-16">
    <!-- Section Header -->
    <div class="relative z-10 mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 relative">
        <span class="">{{ $featuredSection->title ?? 'Featured Products' }}</span>
      </h1>
      <p class="text-gray-600 dark:text-gray-300 text-center mb-2 max-w-2xl">
        {{ $featuredSection->subtitle ?? 'Discover our most popular and trending products' }}
      </p>
      <!-- Decorative line -->
      <div class="flex items-center justify-center mt-6">
        <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
        <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
        <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
      </div>
    </div>

    <div class="w-[90%] md:w-full max-w-7xl overflow-hidden relative">
      <!-- Left Arrow Button -->
      <button id="scrollLeft" class="absolute left-2 md:left-8 top-1/2 transform -translate-y-1/2 p-3 rounded-full z-10 bg-white hover:bg-primary-gradient text-black hover:text-white w-12 h-12 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <!-- Cards Wrapper -->
      <div id="cardContainer" class="flex space-x-6 md:space-x-8 transition-transform duration-500 py-10">
        @forelse($featuredProducts as $data)
          <div class="card min-w-[290px] md:min-w-[365px] h-full bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl border border-gray-100 dark:border-gray-700">
            <div class="relative">
              <img src="{{ Helpers::image($data->main_image, 'products/') }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105" alt="{{ $data->name }}" />
              <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/50 to-transparent"></div>
              
              @if($data->discount_price && $data->discount_price < $data->price)
                <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                  {{ round((($data->price - $data->discount_price) / $data->price) * 100) }}% OFF
                </span>
              @endif
            </div>
            
            <div class="p-6">
              <h2 class="text-xl font-bold mb-3 dark:text-white">{{ $data->name }}</h2>
              
              @if(isset($data->approved_reviews_avg_rating) && $data->approved_reviews_avg_rating > 0)
                <div class="flex items-center mb-3">
                  <div class="flex gap-1">
                    @for ($i = 1; $i <= 5; $i++)
                      <svg class="w-4 h-4 {{ $i <= $data->approved_reviews_avg_rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                           fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    @endfor
                  </div>
                  <span class="text-xs text-gray-500 ml-2">({{ $data->approved_reviews_count ?? 0 }})</span>
                </div>
              @endif
              
              <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                {{ Str::limit(strip_tags($data->description), 80) }}
              </p>
              
              <div class="flex justify-between items-center">
                <div>
                  @if($data->discount_price && $data->discount_price < $data->price)
                    <span class="text-xl font-bold text-blue-600 dark:text-blue-400">
                      {{ Helpers::formatPrice($data->discount_price) }}
                    </span>
                    <span class="text-sm text-gray-500 line-through">
                      {{ Helpers::formatPrice($data->price) }}
                    </span>
                  @else
                    <span class="text-xl font-bold text-blue-600 dark:text-blue-400">
                      {{ Helpers::formatPrice($data->price) }}
                    </span>
                  @endif
                </div>
                
                <a href="{{ route('front.products.show', $data->slug) }}" class="bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:shadow-lg transition-all duration-300 group">
                  <span>Details</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="w-full text-center py-12">
            <p class="text-gray-500 dark:text-gray-400">No featured products available</p>
          </div>
        @endforelse
      </div>

      <!-- Right Arrow Button -->
      <button id="scrollRight" class="absolute right-2 md:right-8 top-1/2 transform -translate-y-1/2 p-3 rounded-full z-10 bg-white hover:bg-primary-gradient text-black hover:text-white w-12 h-12 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>

    <!-- Indicator Dots -->
    <div id="indicatorContainer" class="flex space-x-3 mt-8">
      @foreach($featuredProducts as $i => $product)
        <button class="w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-700 transition-all duration-300 hover:bg-purple-500 hover:dark:bg-purple-500 {{ $i === 0 ? 'bg-purple-500 dark:bg-purple-500' : '' }}"></button>
      @endforeach
    </div>
  </section>

  <!-- Categories Section -->
  <section class="relative py-20 overflow-hidden text-gray-800 dark:text-white transition-all duration-500">
    <div class="z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Section Header with decorative accents -->
      <div class="text-center mb-16">
        <span class="inline-block px-5 py-2 rounded-full bg-purple-100 bg-opacity-50 dark:bg-purple-800 dark:bg-opacity-50 text-purple-700 dark:text-pink-100 text-sm font-medium mb-4 border border-transparent dark:border-pink-500 dark:border-opacity-30 shadow-sm">
          {{ $categorySection->badge ?? 'Featured Categories' }}
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
          {{ $categorySection->title ?? 'Discover Our Premium Selections' }}
        </h2>
        <p class="max-w-2xl mx-auto text-gray-600 dark:text-purple-200">
          {{ $categorySection->subtitle ?? 'Explore our handpicked categories designed to enhance your digital lifestyle and experience.' }}
        </p>
        <!-- Decorative line -->
        <div class="flex items-center justify-center mt-6">
          <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
          <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2"></div>
          <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
        </div>
      </div>

      <div class="w-full overflow-hidden">
        <div id="carousel" class="flex transition-transform duration-500">
          @forelse($categories as $index => $category)
            <div class="min-w-full opacity-0 translate-y-8" data-carousel-item data-index="{{ $index }}">
              <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl dark:shadow-purple-900/20 p-8 backdrop-blur-sm bg-opacity-80 dark:bg-opacity-30 border dark:border-white hover:shadow-2xl transition-all duration-500">
                <div class="flex flex-col lg:flex-row gap-8">
                  <!-- Text Content -->
                  <div class="w-full lg:w-1/3 flex flex-col justify-center">
                    <h3 class="text-2xl font-bold">
                      {{ $category->name }}
                    </h3>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">
                      {{ $category->description ?? 'Explore our selection of high-quality products in this category.' }}
                    </p>

                    <!-- button -->
                    <div class="mt-6">
                      <a href="{{ route('front.products.index', ['category' => $category->slug]) }}" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                        Explore {{ $category->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>

                  <!-- Images Grid -->
                  <div class="w-full lg:w-2/3 grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($category->subcategories->take(3) as $subcategory)
                      <div class="group bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-[1.02]">
                        <div class="p-6 flex flex-col items-center gap-y-4 h-full">
                          <img src="{{ Helpers::image($subcategory->image, 'categories/', 'category-placeholder.jpg') }}" class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-300" alt="{{ $subcategory->name }}" />
                          <p class="text-xl font-bold text-center text-gray-800 dark:text-white">{{ $subcategory->name }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="min-w-full text-center py-12">
              <p class="text-gray-500 dark:text-gray-400">No categories available</p>
            </div>
          @endforelse
        </div>

        <!-- Navigation Buttons (Only show if there are categories) -->
        @if(count($categories) > 0)
          <!-- Navigation Left Button -->
          <button id="prev" class="absolute left-4 lg:left-12 top-2/3 transform -translate-y-1/2 p-3 bg-white hover:bg-primary-gradient text-black hover:text-white w-12 h-12 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-full shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Navigation Right Button -->
          <button id="next" class="absolute right-4 lg:right-12 top-2/3 transform -translate-y-1/2 p-3 bg-white hover:bg-primary-gradient text-black hover:text-white w-12 h-12 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-full shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>

          <!-- Navigation Dots -->
          <div id="indicators" class="flex justify-center mt-8 space-x-3">
            @foreach($categories as $index => $category)
              <button data-index="{{ $index }}" class="indicator w-3 h-3 rounded-full bg-purple-200 dark:bg-purple-700 hover:bg-purple-500 dark:hover:bg-pink-500 {{ $index === 0 ? 'bg-gradient-to-r from-purple-500 to-pink-500 w-8' : '' }} transition-all duration-300"></button>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Latest Products Section -->
  <section class="relative py-20 overflow-hidden text-gray-800 dark:text-white transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
      <!-- Section Header with decorative accents -->
      <div class="text-center mb-16 relative">
        <span class="inline-block px-5 py-2 rounded-full bg-purple-100 bg-opacity-50 dark:bg-purple-800 dark:bg-opacity-50 text-purple-700 dark:text-pink-100 text-sm font-medium mb-4 border border-transparent dark:border-pink-500 dark:border-opacity-30 shadow-sm">
          {{ $latestSection->badge ?? 'New Arrivals' }}
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
          {{ $latestSection->title ?? 'Our Latest Products' }}
        </h1>
        <p class="max-w-2xl mx-auto text-gray-600 dark:text-purple-200">
          {{ $latestSection->subtitle ?? 'Check out our newest products added to our collection.' }}
        </p>
        <!-- Decorative line -->
        <div class="flex items-center justify-center mt-6">
          <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
          <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
          <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
        </div>
      </div>

      <!-- Products Grid -->
      <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($latestProducts as $index => $product)
          <!-- Product Card with animation classes -->
          <div class="product-card opacity-0 transform translate-y-8 transition-all duration-700 ease-out bg-white dark:bg-gray-800 bg-opacity-80 dark:bg-opacity-30 backdrop-filter backdrop-blur-lg rounded-2xl overflow-hidden group h-[450px] shadow-xl hover:shadow-2xl hover:scale-[1.02]" data-delay="{{ $index * 100 }}">
            <!-- Status Badge -->
            @if($product->discount_price && $product->discount_price < $product->price)
              <div class="absolute top-4 right-4 z-10">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-pink-600 to-purple-600 font-bold text-white shadow-lg">
                  -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                </div>
              </div>
            @endif

            <!-- Product Image -->
            <div class="h-[250px] w-full overflow-hidden">
              <img
                src="{{ Helpers::image($product->main_image, 'products/', 'product-placeholder.jpg') }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>

            <!-- Product Info -->
            <div class="p-6 flex flex-col flex-grow">
              <h2 class="text-xl font-bold mb-2 text-black dark:text-white">{{ $product->name }}</h2>
              <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">
                {{ Str::limit(strip_tags($product->description), 80) }}
              </p>
              <div class="mt-auto flex justify-between items-end">
                <div>
                  @if($product->discount_price && $product->discount_price < $product->price)
                    <span class="text-xl font-bold block mb-1 text-gray-800 dark:text-white">
                      {{ Helpers::formatPrice($product->discount_price) }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-300 line-through">
                      {{ Helpers::formatPrice($product->price) }}
                    </span>
                  @else
                    <span class="text-xl font-bold block mb-1 text-gray-800 dark:text-white">
                      {{ Helpers::formatPrice($product->price) }}
                    </span>
                  @endif
                </div>
              </div>
            </div>

            <!-- Hover Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600 to-pink-600 bg-opacity-90 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500 p-6">
              <a href="{{ route('front.cart.add', $product->id) }}" class="mb-6 w-full add-to-cart" data-product-id="{{ $product->id }}">
                <button class="w-full bg-white text-purple-800 hover:bg-purple-100 py-3 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span>Add to Cart</span>
                </button>
              </a>
              <div class="flex justify-center space-x-6 w-full">
                <a href="{{ route('front.products.show', $product->slug) }}" class="flex flex-col items-center text-white hover:text-pink-200 transition-colors duration-300">
                  <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                  <span class="text-xs font-medium">View Details</span>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-4 text-center py-12">
            <p class="text-gray-500 dark:text-gray-400">No products available</p>
          </div>
        @endforelse
      </div>

      <!-- View All Button -->
      <div class="mt-10 flex justify-center items-center">
        <a href="{{ route('front.products.index') }}" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
          Explore all products
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="relative text-gray-900 dark:text-white transition-colors duration-300 py-20 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full -translate-x-1/2 -translate-y-1/2 dark:from-blue-500/20 dark:to-purple-500/20"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-tl from-indigo-500/10 to-pink-500/10 rounded-full translate-x-1/3 translate-y-1/3 dark:from-indigo-500/20 dark:to-pink-500/20"></div>

    <!-- Container -->
    <div class="container mx-auto px-4 relative z-10">
      <!-- Heading with animated underline -->
      <div class="text-center max-w-3xl mx-auto mb-16">
        <h1 class="text-3xl md:text-5xl font-bold inline-block">
          {{ $servicesSection->title }}
        </h1>
        <p class="text-center text-gray-700 dark:text-gray-300 mt-4 text-lg max-w-2xl mx-auto leading-relaxed">
          {{ $servicesSection->subtitle }}
        </p>
        <!-- Decorative line -->
        <div class="flex items-center justify-center mt-6">
          <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
          <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
          <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
        </div>
      </div>

      <!-- Cards Container with staggered animation -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
        @forelse($services as $index => $service)
          <!-- Adding data-aos attributes for AOS animation library -->
          <div class="service-card group"
            data-aos="fade-up"
            data-aos-delay="{{ $index * 100 }}"
            data-aos-duration="800">

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden h-full flex flex-col transform hover:-translate-y-2">
              <!-- Image Container with Overlay -->
              <div class="relative overflow-hidden">
                <!-- Image with zoom effect -->
                <img src="{{ $service->image ? Helpers::image($service->image, 'services/') : asset('assets/front/images/homePageServicesImg.png') }}"
                  alt="{{ $service->title }}"
                  class="w-full h-56 sm:h-64 object-cover transition-transform duration-700 group-hover:scale-110">

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                  <span class="text-white font-medium px-4 py-2 ml-3 mb-3 text-sm bg-indigo-600/80 backdrop-blur-sm rounded-lg">
                    View Details
                  </span>
                </div>
              </div>

              <!-- Content -->
              <div class="p-6 flex-grow flex flex-col">
                @if($service->category)
                  <span class="bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-300 text-xs font-semibold px-3 py-1 rounded-full w-fit mb-3">
                    {{ $service->category->name }}
                  </span>
                @endif

                <!-- Title with animated underline on hover -->
                <h2 class="text-xl font-bold group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300 relative inline-block">
                  {{ $service->title }}
                  <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 dark:bg-indigo-400 group-hover:w-full transition-all duration-300"></span>
                </h2>

                <!-- Description -->
                <p class="text-gray-600 dark:text-gray-400 mt-3 text-sm leading-relaxed flex-grow">
                  {{ Str::limit(strip_tags($service->summary ?? $service->content), 120) }}
                </p>

                <!-- Learn More link -->
                <a href="{{ route('front.services.show', $service->slug) }}" class="mt-4 text-indigo-600 dark:text-indigo-400 font-medium text-sm flex items-center w-fit group-hover:translate-x-1 transition-transform duration-300">
                  Learn more
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-3 text-center py-12">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md inline-block">
              <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <p class="text-gray-500 dark:text-gray-400">No services available at the moment</p>
            </div>
          </div>
        @endforelse
      </div>

      <!-- View All Button -->
      <div class="mt-10 flex justify-center items-center">
        <a href="{{ route('front.services.index') }}" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
          Explore all services
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Blog Section -->
  <section class="py-20 bg-gray-50 dark:bg-gray-800/50">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-16">
        <span class="inline-block px-5 py-2 rounded-full bg-purple-100 bg-opacity-50 dark:bg-purple-800 dark:bg-opacity-50 text-purple-700 dark:text-pink-100 text-sm font-medium mb-4 border border-transparent dark:border-pink-500 dark:border-opacity-30 shadow-sm">
          From Our Blog
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
          {{ $blogSection->title }}
        </h2>
        <p class="max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
          {{ $blogSection->subtitle }}
        </p>
        <!-- Decorative line -->
        <div class="flex items-center justify-center mt-6">
          <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
          <div class="h-1 w-24 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-2 animate-pulse"></div>
          <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
        </div>
      </div>

      <!-- Blog Posts -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($latestBlogs as $blog)
          <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
            <!-- Featured Image -->
            <div class="relative h-52 overflow-hidden">
              <img src="{{ $blog->featured_image ? Helpers::image($blog->featured_image, 'blog/') : asset('assets/front/images/modernImage.png') }}" 
                   alt="{{ $blog->title }}" 
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/60 to-transparent"></div>
              
              @if($blog->category)
                <span class="absolute top-4 right-4 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                  {{ $blog->category->name }}
                </span>
              @endif
            </div>
            
            <!-- Content -->
            <div class="p-6">
              <!-- Date -->
              <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $blog->created_at->format('M d, Y') }}
              </div>
              
              <!-- Title -->
              <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                {{ Str::limit($blog->title, 60) }}
              </h3>
              
              <!-- Summary -->
              <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                {{ Str::limit($blog->summary ?? strip_tags($blog->content), 120) }}
              </p>
              
              <!-- Read More Link -->
              <a href="{{ route('front.blog.show', $blog->slug) }}" 
                 class="inline-flex items-center text-purple-600 dark:text-purple-400 font-medium text-sm group">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" 
                     viewBox="0 0 20 20" 
                     fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        @empty
          <div class="col-span-3 text-center py-12">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md inline-block">
              <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
              </svg>
              <p class="text-gray-500 dark:text-gray-400">No blog posts available at the moment</p>
            </div>
          </div>
        @endforelse
      </div>
      
      <!-- View All Button -->
      <div class="mt-10 flex justify-center items-center">
        <a href="{{ route('front.blog.index') }}" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
          View All Articles
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Hot Topics -->
  <section class="relative py-24 overflow-hidden w-full mx-auto">
    <!-- ... existing code ... -->
  </section>

@endsection

@section('script')
  <script src="{{asset('assets/front/js/homePageCards.js')}}"></script>
  <script src="{{asset('assets/front/js/homePageBrandCategoriesSection.js')}}"></script>
  <script src="{{asset('assets/front/js/homePageOurProducts.js')}}"></script>
  
  <!-- AOS Animation Initialization -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize AOS
      if (typeof AOS !== 'undefined') {
        AOS.init({
          duration: 800,
          once: true,
          easing: 'ease-out'
        });
      }
      
      // Add to cart functionality
      document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          const productId = this.dataset.productId;
          
          fetch(`{{ route('front.cart.add', '') }}/${productId}`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              quantity: 1
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Update cart count
              if (window.updateCartCount) {
                window.updateCartCount(data.cart_count);
              }
              
              // Show success message
              alert('Product added to cart!');
            } else {
              alert(data.message || 'Failed to add product to cart');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding the product to cart');
          });
        });
      });
    });
  </script>
@endsection
