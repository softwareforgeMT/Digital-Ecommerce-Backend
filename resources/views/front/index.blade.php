@extends('front.layouts.app')


@section('meta_title', "Home" )

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
        <span class="">Latest Products</span>
      </h1>
      <p class="text-gray-600 dark:text-gray-300 text-center mb-2 max-w-2xl">
        {{ 'Discover our latest popular and trending products' }}
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
      <div id="cardContainer" class="flex items-stretch space-x-6 md:space-x-8 transition-transform duration-500 py-10">
        @forelse($featuredProducts as $data)
         @include('front.products.includes.product-card')
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


    <!-- View All Button -->
      <div class="mt-10 flex justify-center items-center">
        <a href="{{ route('front.products.index') }}" class="group inline-flex items-center px-6 py-3 rounded-full bg-primary-gradient text-white font-medium transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
          Explore all Products
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
          </svg>
        </a>
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
          @include('front.services.includes.services-card')
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
        @forelse($latestBlogs as $post)
         @include('front.blog.includes.blog-card')
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
