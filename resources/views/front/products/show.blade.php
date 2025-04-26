@extends('front.layouts.app')

@section('meta')
    <title>{{ $product->name }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($product->description), 160) }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-50 dark:bg-gray-800 py-4">
        <div class="container mx-auto px-4">
            <nav class="text-sm">
                <a href="/" class="text-gray-600 dark:text-gray-400 hover:text-purple-600">Home</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('front.products.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-purple-600">Products</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-purple-600">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Product Details -->
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Product Images -->
            <div class="lg:w-1/2">
                <div class="relative">
                    @if($product->gallery && count(json_decode($product->gallery)) > 0)
                        <div class="swiper productGallery">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($product->gallery) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ Helpers::image($image, 'products/') }}" 
                                             alt="{{ $product->name }}"
                                             class="w-full rounded-lg aspect-square object-cover">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="lg:w-1/2">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $product->name }}</h1>
                
                <!-- Product Meta -->
                <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                    @if($product->sku)
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 dark:text-gray-400">SKU:</span>
                            <span class="font-medium dark:text-white">{{ $product->sku }}</span>
                        </div>
                    @endif
                    @if($product->type)
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 dark:text-gray-400">Type:</span>
                            <span class="font-medium dark:text-white">{{ $product->type }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600 dark:text-gray-400">Stock:</span>
                        @if($product->quantity > 0)
                            <span class="text-green-600">In Stock ({{ $product->quantity }} available)</span>
                        @else
                            <span class="text-red-600">Out of Stock</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600 dark:text-gray-400">Category:</span>
                        <span class="font-medium dark:text-white">{{ $product->category->name }}</span>
                    </div>
                </div>

                <!-- Price Section -->
                <div class="mb-6">
                    <div class="price-display">
                        @if($product->discount_price)
                            <span class="text-3xl font-bold text-red-500">${{ number_format($product->discount_price, 2) }}</span>
                            <span class="text-xl text-gray-500 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                        @else
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                </div>

                <!-- Product Options -->
                @if($product->variations)
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-4 dark:text-white">Product Options & Add-ons</h3>
                        <form id="product-options-form">
                            @foreach(json_decode($product->variations, true) as $variation)
                                <div class="mb-4">
                                    <div class="flex items-center mb-2">
                                        <label class="block text-gray-700 dark:text-gray-300 font-medium">
                                            {{ $variation['option_type_name'] }}
                                            <span class="text-sm font-normal text-gray-500">(Optional)</span>
                                        </label>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($variation['values'] as $value)
                                            <label class="option-value-label cursor-pointer">
                                                <input type="radio" 
                                                       name="option_values[{{ $variation['option_type_id'] }}]" 
                                                       value="{{ $value['value'] }}"
                                                       class="hidden option-input"
                                                       data-option-type="{{ $variation['option_type_id'] }}"
                                                       data-additional-price="{{ $value['additional_price'] }}"
                                                       onclick="this.checked = !this._checked; this._checked = this.checked; handleOptionChange(this)">
                                                <span class="px-4 py-2 rounded-lg border-2 border-gray-200 
                                                           hover:border-purple-500 inline-block option-value
                                                           dark:border-gray-600 dark:hover:border-purple-500">
                                                    {{ $value['value'] }}
                                                    @if($value['additional_price'] > 0)
                                                        <span class="text-sm ml-1">
                                                            <span class="text-purple-600">+{{ Helpers::formatPrice($value['additional_price']) }}</span>
                                                        </span>
                                                    @endif
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                @endif

                <!-- Add to Cart Button -->
                <button type="button" 
                        @if($product->quantity <= 0) disabled @endif
                        onclick="addToCart()"
                        class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 
                               transition-colors mb-6 flex items-center justify-center gap-2
                               disabled:bg-gray-400 disabled:cursor-not-allowed">
                    <i class="fas fa-shopping-cart"></i>
                    {{ $product->quantity > 0 ? 'Add to Cart' : 'Out of Stock' }}
                </button>

                <!-- Tags -->
                @if($product->tags)
                    <div class="flex flex-wrap gap-3 mb-6">
                        @foreach(json_decode($product->tags) as $tag)
                            <x-tag>{{ $tag }}</x-tag>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="mt-12 container mx-auto">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <nav class="flex gap-4">
                    <button type="button" 
                            id="details-tab"
                            class="py-4 px-1 border-b-2 border-purple-600 text-purple-600">
                        Product Details
                    </button>
                    <button type="button"
                            id="reviews-tab"
                            class="py-4 px-1 border-b-2 border-transparent">
                        Reviews
                    </button>
                </nav>
            </div>

            <div class="py-8">
                <div id="details-content" class="tab-content">
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        {!! $product->description !!}
                    </div>
                </div>
                <div id="reviews-content" class="tab-content hidden">
                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="space-y-8">
                            <!-- Rating Overview -->
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Overall Rating -->
                                    <div class="text-center md:text-left">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Customer Reviews</h3>
                                        <div class="flex items-center md:justify-start justify-center mb-2">
                                            <div class="flex">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 {{ $i <= round($product->approved_reviews_avg_rating ?: 0) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ number_format($product->approved_reviews_avg_rating ?: 0, 1) }} out of 5
                                            </p>
                                        </div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product->approved_reviews_count }} {{ Str::plural('review', $product->approved_reviews_count) }}</p>
                                    </div>

                                    <!-- Rating Breakdown -->
                                    <div>
                                        @php
                                            $ratings = [5, 4, 3, 2, 1];
                                            $totalReviews = $product->approved_reviews_count > 0 ? $product->approved_reviews_count : 1;
                                        @endphp

                                        @foreach($ratings as $rating)
                                            @php
                                                $countForRating = $product->approvedReviews()->where('rating', $rating)->count();
                                                $percentage = ($countForRating / $totalReviews) * 100;
                                            @endphp
                                            <div class="flex items-center mt-3">
                                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 w-14">{{ $rating }} stars</span>
                                                <div class="w-full h-4 mx-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                                    <div class="h-4 bg-yellow-400 rounded-full" style="width: {{ $percentage }}%"></div>
                                                </div>
                                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 w-14 text-right">{{ $countForRating }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Write Review Button -->
                                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                                    @auth
                                        @if($canReview)
                                            <button id="open-review-modal" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Write a Review
                                            </button>
                                        @elseif($userReview)
                                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                                <p class="text-sm text-blue-800 dark:text-blue-300">
                                                    You've already reviewed this product. 
                                                    <button id="open-edit-review-modal" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 underline">
                                                        Edit your review
                                                    </button>
                                                </p>
                                            </div>
                                        @else
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Only verified purchasers can leave a review.
                                            </p>
                                        @endif
                                    @else
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Please <a href="{{ route('user.login') }}" class="text-purple-600 hover:text-purple-500">sign in</a> to write a review.
                                        </p>
                                    @endauth
                                </div>
                            </div>

                            <!-- Reviews List -->
                            <div class="space-y-6">
                                @forelse($reviews as $review)
                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <img src="{{ Helpers::image($review->user->photo, 'user/avatar/', 'user.png') }}" 
                                                     alt="{{ $review->user->name }}" 
                                                     class="w-10 h-10 rounded-full">
                                                <div class="ml-4">
                                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $review->user->name }}</h4>
                                                    <div class="flex items-center mt-1">
                                                        <div class="flex">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                                                                     fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                                </svg>
                                                            @endfor
                                                        </div>
                                                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                                                            {{ $review->created_at->format('M d, Y') }}
                                                        </span>
                                                        @if($review->verified_purchase)
                                                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                                                Verified Purchase
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4 prose prose-sm max-w-none text-gray-500 dark:text-gray-400">
                                            {{ $review->review_text }}
                                        </div>

                                        @if($review->admin_reply)
                                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="Store" class="w-6 h-6">
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Store Response</p>
                                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                            {{ $review->admin_reply }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <div class="text-center py-12">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No reviews yet</h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Be the first to review this product</p>
                                    </div>
                                @endforelse

                                <!-- Pagination -->
                                @if($reviews->hasPages())
                                    <div class="mt-6">
                                        {{ $reviews->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($related_products->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Related Products</h2>
                <div class="grid md:grid-cols-4 gap-6">
                    @foreach($related_products as $relatedProduct)
                        <a href="{{ route('front.products.show', $relatedProduct->slug) }}" 
                           class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300">
                            <img src="{{ Helpers::image($relatedProduct->main_image, 'products/') }}" 
                                 alt="{{ $relatedProduct->name }}"
                                 class="w-full aspect-square object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedProduct->name }}</h3>
                                <div class="flex items-center justify-between">
                                    @if($relatedProduct->discount_price)
                                        <span class="text-red-500 font-bold">${{ number_format($relatedProduct->discount_price, 2) }}</span>
                                        <span class="text-gray-500 line-through text-sm">${{ number_format($relatedProduct->price, 2) }}</span>
                                    @else
                                        <span class="text-purple-600 dark:text-purple-400 font-bold">${{ number_format($relatedProduct->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

   @include('front.partials.review')
@endsection

@section('script')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper
    if (document.querySelector('.productGallery')) {
        new Swiper('.productGallery', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

    // Initialize checked state for radio buttons
    document.querySelectorAll('.option-input').forEach(input => {
        input._checked = false;
    });
});

function handleOptionChange(input) {
    const optionLabel = input.closest('.option-value-label').querySelector('.option-value');
    
    if (input._checked) {
        optionLabel.classList.add('selected-option', 'border-purple-500', 'bg-purple-50', 'text-purple-600');
    } else {
        optionLabel.classList.remove('selected-option', 'border-purple-500', 'bg-purple-50', 'text-purple-600');
    }

    updatePrice();
}

function updatePrice() {
    const selectedOptions = {};
    let additionalPrice = 0;

    document.querySelectorAll('.option-input').forEach(input => {
        if (input._checked) {
            selectedOptions[input.dataset.optionType] = input.value;
            additionalPrice += parseFloat(input.dataset.additionalPrice || 0);
        }
    });

    const basePrice = {{ $product->discount_price ?: $product->price }};
    const totalPrice = basePrice + additionalPrice;

    document.querySelector('.price-display').innerHTML = `
        <span class="text-3xl font-bold text-gray-900 dark:text-white">$${totalPrice.toFixed(2)}</span>
        ${basePrice !== totalPrice ? `<span class="text-sm text-gray-500 ml-2">(Base price: $${basePrice.toFixed(2)})</span>` : ''}
    `;
}

// Simple direct tab switching with plain JavaScript
function switchTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(function(content) {
        content.classList.add('hidden');
    });
    
    // Remove active classes from all tabs
    document.querySelectorAll('[id$="-tab"]').forEach(function(tab) {
        tab.classList.remove('border-purple-600', 'text-purple-600');
        tab.classList.add('border-transparent');
    });
    
    // Show the selected tab content
    document.getElementById(tabName + '-content').classList.remove('hidden');
    
    // Add active classes to the selected tab
    document.getElementById(tabName + '-tab').classList.remove('border-transparent');
    document.getElementById(tabName + '-tab').classList.add('border-purple-600', 'text-purple-600');
}

// Initialize tab functionality when DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Attach click events to tabs
    document.getElementById('details-tab').addEventListener('click', function() {
        switchTab('details');
    });
    
    document.getElementById('reviews-tab').addEventListener('click', function() {
        switchTab('reviews');
    });
    
    // Initialize first tab
    switchTab('details');
});

function addToCart() {
    const options = {};
    document.querySelectorAll('.option-input').forEach(input => {
        if (input._checked) {
            options[input.dataset.optionType] = input.value;
        }
    });

    fetch('{{ route('front.cart.add') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: {{ $product->id }},
            quantity: 1,
            options: options
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update cart count in header
            document.getElementById('cart-count').textContent = data.cart_count;
            
            // Show success message
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            toast.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>Added to cart successfully!</span>
                </div>
            `;
            document.body.appendChild(toast);
            
            // Remove toast after 3 seconds
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>



<style>
    .option-input:checked + .option-value {
        border-color: rgb(147, 51, 234);
        background-color: rgb(243, 232, 255);
        color: rgb(147, 51, 234);
    }
</style>
@endsection


