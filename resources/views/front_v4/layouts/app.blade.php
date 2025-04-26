<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OP Vault</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}" />
    <!-- ** [ COLOR CSS STYLE FILLE LINK ] ** -->
    
    @yield('css')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-purple': '#0e0c1f', 
                        'purple': {
                            DEFAULT: '#8B5CF6',
                            dark: '#7C3AED',
                            light: '#A78BFA'
                        }
                    },
                    fontFamily: {
                        sans: ['Space Grotesk', 'sans-serif'],
                    }
                }
            }
        }
    </script>

</head>
<body class="bg-dark-purple text-white font-sans">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" 
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[90] hidden"
         onclick="toggleMobileMenu()">
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-menu" 
         class="fixed top-0 left-0 w-[280px] h-full bg-dark-purple border-r border-purple-500/20 z-[100] transform -translate-x-full transition-transform duration-300 overflow-y-auto">
        <div class="p-4 border-b border-purple-500/20">
            <div class="flex items-center justify-between">
                <img src="{{ URL::asset('assets/images/logo-lg.png') }}" alt="OP Vault Logo" class="h-8">
                <button onclick="toggleMobileMenu()" class="p-2 hover:bg-purple-500/10 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="p-4 space-y-4">
            <!-- Mobile Navigation Links -->
            <div class="space-y-4">
                <div class="mobile-dropdown">
                    <button onclick="toggleMobileDropdown('products-dropdown')" 
                            class="w-full flex items-center justify-between p-2 hover:bg-purple-500/10 rounded-lg">
                        <span>Products</span>
                        <svg class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="products-dropdown" class="hidden pl-4 mt-2 space-y-2">
                        @forelse($navbarProducts as $product)
                            <a href="{{ route('front.product.details', $product->slug) }}" 
                               class="block p-2 hover:bg-purple-500/10 rounded-lg">
                                {{ $product->name }}
                            </a>
                        @empty
                            <span class="block p-2 text-gray-400">No products available</span>
                        @endforelse
                        <a href="{{ route('front.products.index') }}" class="block p-2 hover:bg-purple-500/10 rounded-lg">
                            View All Products
                        </a>
                    </div>
                </div>
                <a href="{{route('front.about')}}" class="block p-2 hover:bg-purple-500/10 rounded-lg">About</a>
                <a href="{{route('front.help.faqs')}}" class="block p-2 hover:bg-purple-500/10 rounded-lg">FAQs</a>
                <a href="{{route('front.help.overview')}}" class="block p-2 hover:bg-purple-500/10 rounded-lg">Help</a>
            </div>

            <!-- Mobile Auth Section -->
            @auth
                <div class="border-t border-purple-500/20 pt-4">
                    <div class="flex items-center space-x-3 p-2">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-purple-500/20">
                            <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="space-y-2 mt-4">
                        <a href="{{ route('user.dashboard') }}" class="block p-2 hover:bg-purple-500/10 rounded-lg">
                            Dashboard
                        </a>
                        <a href="{{ route('user.account-settings') }}" class="block p-2 hover:bg-purple-500/10 rounded-lg">
                            Settings
                        </a>
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left p-2 text-red-400 hover:bg-purple-500/10 rounded-lg">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="border-t border-purple-500/20 pt-4 space-y-4">
                    <a href="{{route('user.login')}}" class="block p-2 hover:bg-purple-500/10 rounded-lg">Login</a>
                    <a href="{{route('subscription.checkout.show')}}" class="btn btn-primary w-full">Purchase Now</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Header/Navigation -->
    <header class="navbar-border sticky top-0 z-[80] bg-dark-purple/80 backdrop-blur-xl">
        <div class="container mx-auto px-4 py-6">
            <!-- Desktop Layout -->
            <div class="hidden md:flex items-center justify-between">
                <!-- Left - Logo -->
                <a href="/" class="flex items-center flex-shrink-0">
                    <img src="{{ URL::asset('assets/images/logo-lg.png') }}" alt="OP Vault Logo" class="h-8">
                </a>

                <!-- Center - Navigation -->
                <nav class="flex items-center space-x-8 flex-grow justify-center">
                    <div class="relative dropdown">
                        <button class="flex items-center space-x-1 text-white hover:text-purple-400">
                            <span>Products</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            @forelse($navbarProducts as $product)
                            <a href="{{ route('front.product.details', $product->slug) }}" class="dropdown-item group">
                                <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center">
                                    <img src="{{ Helpers::image($product->image, 'product/') }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-6 h-6 object-cover rounded">
                                </div>
                                <div>
                                    <div class="font-medium text-white group-hover:text-purple-400">{{ $product->name }}</div>
                                    <div class="text-sm {{ $product->detection_status === 'undetected' ? 'text-green-400' : 'text-red-400' }}">
                                        {{ ucfirst($product->detection_status) }}
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="p-4 text-gray-400 text-sm">No products available</div>
                            @endforelse

                            <div class="border-t border-purple-500/20 mt-2 pt-2">
                                <a href="{{ route('front.products.index') }}" class="dropdown-item group">
                                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white group-hover:text-purple-400">View All Products</div>
                                        <div class="text-sm text-gray-400">See our complete catalog</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('front.about')}}" class="text-white hover:text-purple-400">About</a>
                    <a href="{{route('front.help.faqs')}}" class="text-white hover:text-purple-400">FAQs</a>
                    <a href="{{route('front.help.overview')}}" class="text-white hover:text-purple-400">Help</a>

                    {{-- @foreach(DB::table('pages')->where('status','=',1)->get() as $data)
                    <a href="{{route('front.page',$data->slug)}}" class="text-white hover:text-purple-400">{{$data->title}}</a>
                    @endforeach --}}
                    
                </nav>

                <!-- Right - Auth/Profile -->
                <div class="flex items-center space-x-4 flex-shrink-0">
                    @auth
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-3 px-4 py-2 rounded-xl hover:bg-purple-500/10 transition-all duration-200 border border-purple-500/20">
                                <div class="w-8 h-8 rounded-full overflow-hidden ring-2 ring-purple-500/20">
                                    <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}" 
                                         alt="Profile" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="hidden md:block text-left">
                                    <div class="font-medium text-sm">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-400">View Profile</div>
                                </div>
                                <svg class="w-4 h-4 hidden md:block transition-transform duration-200" 
                                     :class="{'rotate-180': open}"
                                     fill="none" 
                                     stroke="currentColor" 
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Profile Dropdown -->
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-64 rounded-xl shadow-lg py-1 bg-dark-purple/95 backdrop-blur-xl border border-purple-500/20 z-[85]"
                                 style="display: none;">
                                
                                <div class="p-4 border-b border-purple-500/20 bg-purple-500/5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-purple-500/20">
                                            <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}" 
                                                 alt="Profile" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-medium text-sm">{{ Auth::user()->name }}</div>
                                            <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Menu Items -->
                                <div class="py-2">
                                    <a href="{{ route('user.dashboard') }}" 
                                       class="flex items-center space-x-3 px-4 py-2.5 hover:bg-purple-500/10 transition-colors group">
                                        <svg class="w-5 h-5 text-purple-400 group-hover:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span class="text-sm group-hover:text-purple-400">Dashboard</span>
                                    </a>

                                    <a href="{{ route('user.account-settings') }}" class="dropdown-item group">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </a>

                                    <div class="border-t border-purple-500/20 my-2"></div>

                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item group text-red-400 hover:text-red-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{route('user.login')}}" class="text-white hover:text-purple-400">Login</a>
                        <a href="{{route('subscription.checkout.show')}}" class="btn btn-primary">
                            Purchase Now
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="flex md:hidden items-center justify-between">
                <!-- Left Group - Menu + Logo -->
                <div class="flex items-center space-x-3">
                    <button class="p-2 hover:bg-purple-500/10 rounded-lg" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <a href="/" class="flex items-center">
                        <img src="{{ URL::asset('assets/images/logo-lg.png') }}" alt="OP Vault Logo" class="h-8">
                    </a>
                </div>

                <!-- Right - Profile/Auth -->
                <div class="flex items-center">
                    @auth
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-purple-500/20">
                                    <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}" 
                                         alt="Profile" 
                                         class="w-full h-full object-cover">
                                </div>
                            </button>

                            <!-- Mobile Profile Dropdown -->
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 rounded-xl shadow-lg py-1 bg-dark-purple border border-purple-500/20"
                                 style="display: none;">
                                <div class="p-4 border-b border-purple-500/20">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden">
                                            <img src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}" 
                                                 alt="Profile" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ Auth::user()->name }}</div>
                                            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Menu Items -->
                                <div class="py-2">
                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item group">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span>Dashboard</span>
                                    </a>

                                    <a href="{{ route('user.account-settings') }}" class="dropdown-item group">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </a>

                                    <div class="border-t border-purple-500/20 my-2"></div>

                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item group text-red-400 hover:text-red-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{route('subscription.checkout.show')}}" class="btn btn-primary btn-sm">
                            Purchase
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-opacity-30 bg-black py-16">
        <div class="container mx-auto px-4">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="/" class="hover:opacity-80 transition-opacity">
                    <img src="{{ URL::asset('assets/images/logo-lg.png') }}" alt="OP Vault Logo" class="h-16">
                </a>
            </div>
            
            
            
            <div class="text-center text-sm text-gray-500 mb-8">
                OP Vault | © 2024 OP Vault. All rights reserved.
            </div>
            
            <!-- Footer Navigation -->
            <div class="flex justify-center space-x-6 text-sm">
                <a href="{{route('front.about')}}" class="link">About</a>
                <a href="{{route('front.help.faqs')}}" class="text-white hover:text-purple-400">FAQs</a>
                <a href="{{route('front.help.overview')}}" class="text-white hover:text-purple-400">Help</a>

                <a href="{{route('front.help.terms')}}" class="text-white hover:text-purple-400">Terms of Service</a>
                <a href="{{route('front.help.privacy')}}" class="text-white hover:text-purple-400">
                    Privacy Policy</a>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to create particles
            function createParticles(container) {
                if (!container) return;
                
                // Add stars
                for(let i = 0; i < 20; i++) {
                    const star = document.createElement('div');
                    star.className = 'particle-star';
                    star.style.setProperty('--x', `${Math.random() * 20 - 10}px`);
                    star.style.setProperty('--y', `${Math.random() * 20 - 10}px`);
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.animationDelay = `${Math.random() * 2}s`;
                    container.appendChild(star);
                }
                
                // Add dots
                for(let i = 0; i < 40; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'particle-dot';
                    dot.style.left = `${Math.random() * 100}%`;
                    dot.style.top = `${Math.random() * 100}%`;
                    dot.style.opacity = Math.random() * 0.5 + 0.3;
                    container.appendChild(dot);
                }
            }

            // Initialize particles for all containers
            const particleContainers = document.querySelectorAll('.product-particles, .discord-section .product-particles');
            particleContainers.forEach(createParticles);
        });
    </script>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  var mainurl = "{{url('/')}}";
</script>

<script src="{{ asset('assets/js/custom.min.js') }}"></script>
    @yield('script')

<script src="//unpkg.com/alpinejs" defer></script>
<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-menu-overlay');
        
        menu.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    function toggleMobileDropdown(id) {
        const dropdown = document.getElementById(id);
        const icon = event.currentTarget.querySelector('svg');
        
        dropdown.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
</body>
</html>