@extends('front.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="hero-glow"></div>

    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16 text-center relative overflow-hidden">
        
        <div class="hero-content">
            <div class="particles-container"></div>
            <div class="max-w-3xl mx-auto relative z-10">
                <div class="inline-block px-3 py-1 mb-6 bg-opacity-20 bg-purple-light rounded-full text-sm text-purple-light backdrop-blur-sm">
                    ONE STEP AHEAD
                </div>
                
                <h1 class="text-7xl font-bold mb-4 tracking-tight shake-animation bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                    OP Vault
                </h1>
                <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                    Elite DMA Vault, aimbot, ESP, and more for unstoppable gameplay.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="{{route('front.products.index')}}" class="btn btn-primary text-sm px-4 py-2 sm:text-base sm:px-6 sm:py-3">
                        Explore Our Products
                    </a>
                    
                    <button class="btn btn-discord text-sm px-4 py-2 sm:text-base sm:px-6 sm:py-3">
                        <span>Discord</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="rounded-lg overflow-hidden shadow-2xl border border-gray-800 float-animation glow-effect backdrop-blur-sm">
                <img src="{{asset('assets/front/images/dashboard.png')}}" alt="OP Vault Dashboard" class="w-full h-auto transform transition-transform duration-500 hover:scale-105" />
            </div>
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold text-center mb-16 section-heading-glow bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
            Why Choose Us?
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Community Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12.75c1.63 0 3.07.39 4.24.9 1.08.48 1.76 1.56 1.76 2.73V18H6v-1.62c0-1.17.68-2.25 1.76-2.73 1.17-.51 2.61-.9 4.24-.9zM18 8.25c0 1.24-.64 2.39-1.76 2.73-.34.1-.7.16-1.07.16-.1 0-.19-.01-.28-.03-.81-.17-1.5-.68-1.91-1.37-.41.69-1.1 1.2-1.91 1.37-.09.02-.18.03-.28.03-.37 0-.73-.06-1.07-.16C8.64 10.64 8 9.49 8 8.25c0-1.85 1.35-3.37 3.11-3.62.59-.08 1.19-.08 1.78 0C14.65 4.88 16 6.4 16 8.25zM9 8.25c0 .96.67 1.76 1.56 1.97.37.08.75.02 1.09-.15.33-.16.61-.43.78-.79.14-.28.13-.58-.01-.86-.44-.9-1.89-.9-2.33 0-.14.28-.15.58-.01.86.17.36.45.63.78.79.34.17.72.23 1.09.15.89-.21 1.56-1.01 1.56-1.97 0-1.1-.9-2-2-2s-2 .9-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Welcoming Community</h3>
                <p class="text-gray-400">
                    Enhance your gaming journey by connecting with over 15,000 active members in the OP Vault community.
                </p>
            </div>

            <!-- Reviews Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 9.67l-5.44.83L14 5.5l-2.56 5-5.44.83 3.95 3.86-1 5.81L14 18l5.05 3 -.93-5.81L22 9.67z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Reviews</h3>
                <p class="text-gray-400">
                    We pride ourselves on providing exceptional service, which is reflected through our customer reviews.
                </p>
            </div>

            <!-- Security Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Security</h3>
                <p class="text-gray-400">
                    We prioritize security, constantly improving our services to keep your accounts safe from anti-Vault.
                </p>
            </div>

            <!-- 24/7 Support Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">24/7 Support</h3>
                <p class="text-gray-400">
                    Our dedicated support teams within the community are always prepared to assist you with any queries you may have.
                </p>
            </div>

            <!-- Reliability Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Reliability</h3>
                <p class="text-gray-400">
                    We continuously ensure our services are reliable and well-maintained. Regularly implementing updates.
                </p>
            </div>

            <!-- Affordable Plans Card -->
            <div class="card-glow rounded-lg p-8">
                <div class="bg-purple bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-lg mb-6">
                    <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Affordable Plans</h3>
                <p class="text-gray-400">
                    Lorem ipsum dolor sit amet consectetur. Turpis tristique nulla posuere et amet arcu dictum ultricies convallis.
                </p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold text-center mb-16 section-heading-glow bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">Our Products</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($products as $product)
               @include('front.product.includes.product-card')
            @endforeach
        </div>
    </section>

     <!-- Discord Join Section -->
     <section class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto discord-section rounded-2xl p-12 relative overflow-hidden">
            {{-- <div class="discord-glow"></div> --}}
            <div class="product-particles"></div>
                        <!-- Background Shape Image -->
                        <div class="absolute inset-0 z-0">
                            <img src="{{asset('assets/front/images/bg-shape.png')}}" alt="Background Shape" class="w-full h-full object-cover opacity-30" />
                        </div>
                        
                        <!-- Background Elements -->
                        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-blue-900/30 to-transparent z-0"></div>
                        <div class="absolute top-0 right-0 w-8 h-8 bg-purple-500 rounded-full opacity-20 z-0"></div>
                        <div class="absolute bottom-12 left-32 w-4 h-4 bg-purple-500 rounded-full opacity-20 z-0"></div>
                        
            
            <!-- Content with proper z-index -->
            <div class="relative z-10 space-y-8">
                <!-- Discord Logo -->
                <div class="flex justify-center">
                    <svg class="w-20 h-20 text-purple-400 discord-icon-glow" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/>
                    </svg>
                </div>
                
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold text-center bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                        Join the community
                    </h2>
                    <p class="text-center text-gray-400 text-lg max-w-2xl mx-auto">
                        Join our 450,000+ person community and connect with a more private and decentralized internet. Start for free!
                    </p>
                </div>
                
                <div class="flex justify-center">
                    <button class="btn btn-primary btn-lg">
                        <i class="fab fa-discord text-xl"></i>
                        <span>Join Discord</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
