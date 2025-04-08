<div class="product-card rounded-2xl overflow-hidden relative">
    <!-- Add the particles container here -->
    {{-- <div class="product-particles"></div> --}}
    <div class="product-image-wrapper p-4">
        <img src="{{ Helpers::image($product->image, 'product/') }}" alt="{{ $product['name'] }}" 
             class="w-full h-64 object-cover rounded-xl transform transition-transform duration-500 hover:scale-105" />
        
    </div>
    <div class="p-6 space-y-4">
        <h3 class="text-xl font-bold tracking-tight">
            <a href="{{route('front.product.details',$product->slug)}}" class="link">
                {{ $product->name }}
            </a>
        </h3>
        <div class="flex items-center space-x-2">
            <!-- Detection Status -->
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs border
                @if($product->detection_status === 'undetected')
                    bg-purple-500/10 border-purple-500/20 text-purple-400
                @elseif($product->detection_status === 'detected')
                    bg-red-500/10 border-red-500/20 text-red-400
                @else
                    bg-yellow-500/10 border-yellow-500/20 text-yellow-400
                @endif">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"/>
                    <path d="M11 11h2v6h-2zm0-4h2v2h-2z"/>
                </svg>
                {{ strtoupper($product->detection_status) }}
            </span>

            <!-- Activity Status -->
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs border
                @if($product->status)
                    bg-green-500/10 border-green-500/20 text-green-400
                @elseif($product->status==0)
                    bg-yellow-500/10 border-yellow-500/20 text-yellow-400
                @else
                    bg-red-500/10 border-red-500/20 text-red-400
                @endif">
                <span class="w-2 h-2 rounded-full mr-1
                    @if($product->status)
                        bg-green-400
                    @elseif($product->status==0)
                        bg-yellow-400
                    @else
                        bg-red-400
                    @endif">
                </span>
                {{ $product->status?"Active":'InActive' }}
            </span>
        </div>
        <div class="flex justify-between items-center pt-4">
            <a href="{{route('front.product.details',$product->slug)}}" class="link">
                View Details →
            </a>
            <a href="{{route('subscription.checkout.show')}}" class="btn btn-primary">
                Purchase
            </a>
        </div>
    </div>
</div>