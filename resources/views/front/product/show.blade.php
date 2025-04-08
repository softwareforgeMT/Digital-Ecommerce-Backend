@extends('front.layouts.app')

@section('css')
@endsection

@section('content')
    <!-- Product Page Layout -->
    <div class="relative bg-dark-purple min-h-screen">
        
        
        <!-- Product Header Banner -->
        <div class="w-full bg-gradient-to-r from-gray-900/60 to-black/60 bg-center bg-cover relative py-16" style="background-image: url('{{ asset('assets/front/images/mw3-banner.jpg') }}');">
            <div class="container mx-auto px-4 flex items-center relative z-10">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight">{{ $data->name }}</h1>
                </div>
            </div>
        </div>

        <!-- Main Content Layout -->
        <div class="container mx-auto px-4 py-8">
            
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Left Sidebar - Consolidated -->
                <div class="md:w-96 flex-shrink-0">
                    <div class="sticky top-24">
                        <div class="card-glow rounded-xl backdrop-blur-sm overflow-hidden">
                            <!-- Product Image -->
                            <div class="aspect-video w-full overflow-hidden">
                                <img src="{{ Helpers::image($data->image, 'product/') }}" 
                                     alt="{{ $data->name }}" 
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Product Info -->
                            <div class="p-6 space-y-6">
                                <!-- Status & Platform Info -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col space-y-1">
                                        <span class="text-sm text-gray-400">Status</span>
                                        <div class="flex items-center">
                                            <span class="w-2 h-2 rounded-full mr-2
                                                @if($data->detection_status === 'undetected') bg-green-400
                                                @elseif($data->detection_status === 'detected') bg-red-400
                                                @else bg-yellow-400 @endif">
                                            </span>
                                            <span class="font-medium">{{ ucfirst($data->detection_status) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-1">
                                        <span class="text-sm text-gray-400">Platform</span>
                                        <span class="font-medium">{{ $data->supported_platforms }}</span>
                                    </div>
                                    <div class="flex flex-col space-y-1">
                                        <span class="text-sm text-gray-400">OS Support</span>
                                        <span class="font-medium">{{ $data->supported_os }}</span>
                                    </div>
                                    <div class="flex flex-col space-y-1">
                                        <span class="text-sm text-gray-400">Last Update</span>
                                        <span class="font-medium">{{ $data->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <div class="h-px bg-gradient-to-r from-transparent via-purple-500/20 to-transparent"></div>

                                <!-- Subscription Plans -->
                                <div class="space-y-4">
                                    <h3 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                                        Select Plan
                                    </h3>
                                    <div class="space-y-3">
                                        @foreach($subplans as $plan)
                                            <label class="relative block group">
                                                <input type="radio" name="subscription" value="{{ $plan->id }}" 
                                                       class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                                                <div class="p-4 rounded-lg border border-purple-500/20 cursor-pointer
                                                            transition-all duration-300 group-hover:border-purple-500/30
                                                            peer-checked:bg-purple-500/10 peer-checked:border-purple-500/40">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <h4 class="font-medium">{{ $plan->name }}</h4>
                                                            <p class="text-sm text-gray-400">{{ $plan->interval }} access</p>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="text-xl font-bold text-purple-400">
                                                                ${{ number_format($plan->price, 2) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Selection Indicator -->
                                                <div class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-purple-500 
                                                            text-white hidden peer-checked:flex items-center justify-center 
                                                            transform scale-0 peer-checked:scale-100 transition-transform duration-200">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                                    </svg>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="space-y-3">
                                    <button onclick="handlePurchase()" class="btn btn-primary w-full">
                                        Purchase Now
                                    </button>
                                    <a href="{{ $data->discord_url ?? '#' }}" class="btn btn-discord w-full">
                                        <span>Join Discord</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515..."/>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Important Info -->
                                <div class="p-4 rounded-lg bg-purple-500/5 border border-purple-500/10">
                                    <div class="flex items-center space-x-2 mb-3">
                                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                        </svg>
                                        <span class="font-medium">Important Information</span>
                                    </div>
                                    <ul class="space-y-2 text-sm text-gray-400">
                                        <li class="flex items-start">
                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                            Instant activation after purchase
                                        </li>
                                        <li class="flex items-start">
                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                            24/7 support via Discord
                                        </li>
                                        <li class="flex items-start">
                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                            Regular updates included
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content Area -->
                <div class="flex-1">
                    <!-- Features Section Header -->
                    <div class="flex items-center mb-12">
                        <div class="bg-purple-500/20 p-2 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-purple" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold">Features</h2>
                    </div>

                    <!-- Dynamic Features Section -->
                    <div class="mb-20">
                        <h3 class="text-2xl font-bold mb-6">{{ $data->name }} Features</h3>
                        <p class="text-gray-400 mb-6 max-w-3xl">{!! $data->description !!}</p>
                    </div>

                    <!-- Media Section -->
                    <!-- Modified Video Section -->
                    @isset($data->video)
                        <div class="flex items-center mb-12">
                            <div class="bg-green-500/20 p-2 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold">Media Preview</h2>
                        </div>

                        <div class="card-glow rounded-xl overflow-hidden backdrop-blur-sm mb-12">
                            <div class="aspect-video w-full relative group">
                                <!-- Video Player -->
                                <div class="relative w-full h-full" id="videoWrapper">
                                    <!-- Thumbnail Layer -->
                                    <div class="absolute inset-0 z-10 transition-opacity duration-300" id="thumbnailLayer">
                                        <div class="absolute inset-0 bg-black/60 group-hover:bg-black/40 transition-colors duration-300">
                                            <img src="{{ Helpers::image($data->image, 'product/') }}" 
                                                alt="Video thumbnail" 
                                                class="w-full h-full object-cover opacity-50">
                                        </div>
                                        <!-- Play Button -->
                                        <button onclick="playVideo()" 
                                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                                    bg-purple-500/90 hover:bg-purple-500 w-16 h-16 rounded-full 
                                                    flex items-center justify-center transition-all duration-300 
                                                    group-hover:scale-110 z-20" 
                                                id="playButton">
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <!-- Video Element -->
                                    <video id="productVideo" 
                                        class="w-full h-full object-cover" 
                                        controls
                                        preload="metadata"
                                        poster="{{ Helpers::image($data->image, 'product/') }}">
                                        <source src="{{ Helpers::image($data->video, 'product/video/') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            
                            <!-- Video Info -->
                            <div class="p-4 border-t border-purple-500/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
                                        </svg>
                                        <span class="text-sm text-gray-400">Preview video</span>
                                    </div>
                                    <span class="text-sm text-gray-400">HD</span>
                                </div>
                            </div>
                        </div>
                    @endisset


                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script>
    function handlePurchase() {
    const selectedSubscription = document.querySelector('input[name="subscription"]:checked').value;
    window.location.href = `{{ route('subscription.checkout.show') }}?subid=${selectedSubscription}`;
}

</script>


<script>
    function playVideo() {
        const video = document.getElementById('productVideo');
        const thumbnailLayer = document.getElementById('thumbnailLayer');
        
        if (video && thumbnailLayer) {
            // Hide thumbnail and play button
            thumbnailLayer.style.opacity = '0';
            setTimeout(() => {
                thumbnailLayer.style.display = 'none';
                
                // Play video
                video.play().catch(function(error) {
                    console.error("Video play failed:", error);
                    // Show thumbnail again if video fails to play
                    thumbnailLayer.style.display = 'block';
                    setTimeout(() => thumbnailLayer.style.opacity = '1', 0);
                });
            }, 300);
        }
    }

    // Make sure DOM is loaded before attaching event listeners
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('productVideo');
        const thumbnailLayer = document.getElementById('thumbnailLayer');
        
        if (video && thumbnailLayer) {
            // Handle video pause event
            video.addEventListener('pause', function() {
                if (this.paused && !this.ended) {
                    thumbnailLayer.style.display = 'block';
                    setTimeout(() => thumbnailLayer.style.opacity = '1', 0);
                }
            });

            // Handle video play event
            video.addEventListener('play', function() {
                thumbnailLayer.style.opacity = '0';
                setTimeout(() => thumbnailLayer.style.display = 'none', 300);
            });
            
            // Handle video end event
            video.addEventListener('ended', function() {
                thumbnailLayer.style.display = 'block';
                setTimeout(() => thumbnailLayer.style.opacity = '1', 0);
            });
        }
    });
</script>
@endsection
