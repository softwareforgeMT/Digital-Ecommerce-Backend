@extends('front.help.layout')

@section('meta_title', "Help Center" )
@section('meta_description', "Get help and support for all your questions about our products and services" )




@section('help-content')


<div class="container mx-auto px-4 py-12">
    <!-- Search Bar -->
    <div class="max-w-3xl mx-auto mb-10">
        <div class="relative">
            <input type="text" 
                   class="w-full pl-12 pr-4 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 dark:text-white"
                   placeholder="Search for help topics...">
            <div class="absolute left-4 top-1/2 -translate-y-1/2">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Help Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Getting Started -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-purple-100 dark:bg-purple-900/30 mr-4">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Getting Started</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">New to our platform? Learn the basics and get started with our products and services.</p>
            <a href="{{ route('front.help.guides') }}#getting-started" class="text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Account Management -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-blue-100 dark:bg-blue-900/30 mr-4">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Account Management</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Manage your account settings, update personal information, and secure your account.</p>
            <a href="{{ route('front.help.guides') }}#account-management" class="text-blue-600 dark:text-blue-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Orders & Payments -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-green-100 dark:bg-green-900/30 mr-4">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Orders & Payments</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Find information about placing orders, payment methods, shipping, and delivery.</p>
            <a href="{{ route('front.help.guides') }}#orders-payments" class="text-green-600 dark:text-green-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Services & Features -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-pink-100 dark:bg-pink-900/30 mr-4">
                    <svg class="w-6 h-6 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Services & Features</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Explore our range of services and learn how to make the most of our platform's features.</p>
            <a href="{{ route('front.help.guides') }}#services-features" class="text-pink-600 dark:text-pink-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Returns & Refunds -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-yellow-100 dark:bg-yellow-900/30 mr-4">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Returns & Refunds</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Learn about our return policy, how to initiate returns, and refund processing times.</p>
            <a href="{{ route('front.help.guides') }}#returns-refunds" class="text-yellow-600 dark:text-yellow-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Security & Privacy -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="rounded-full p-3 bg-red-100 dark:bg-red-900/30 mr-4">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold dark:text-white">Security & Privacy</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Information about how we secure your data and protect your privacy on our platform.</p>
            <a href="{{ route('front.help.guides') }}#security-privacy" class="text-red-600 dark:text-red-400 font-medium inline-flex items-center">
                Learn More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Popular FAQs Section -->
    <div class="bg-gradient-to-r from-purple-700 to-pink-600 rounded-2xl p-8 mb-12">
        <h2 class="text-2xl font-bold text-white mb-6">Frequently Asked Questions</h2>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @for($i = 1; $i <= 5; $i++)
                    <div class="py-4" x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left font-medium text-gray-900 dark:text-white">
                            <span>Popular Question {{ $i }}</span>
                            <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <p class="mt-2 text-gray-600 dark:text-gray-300">
                                This is the answer to the frequently asked question. It provides clear information that helps users understand our products, services, or policies better.
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('front.help.faqs') }}" class="inline-flex items-center px-5 py-2 bg-primary-gradient text-white font-medium rounded-lg transition-transform hover:-translate-y-1">
                    View All FAQs
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8 border border-gray-100 dark:border-gray-700">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Still Need Help?</h2>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Our support team is ready to assist you</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2 dark:text-white">Email Support</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Get a response within 24 hours</p>
                <a href="mailto:support@example.com" class="text-blue-600 dark:text-blue-400 font-medium">support@example.com</a>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2 dark:text-white">Live Chat</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Available Mon-Fri, 9am-5pm</p>
                <button class="text-green-600 dark:text-green-400 font-medium">Start Chat</button>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2 dark:text-white">Phone Support</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Call us for immediate help</p>
                <a href="tel:+1234567890" class="text-purple-600 dark:text-purple-400 font-medium">+1 (234) 567-890</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[type="text"]');
        
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value.toLowerCase().trim();
                
                if (searchTerm.length > 0) {
                    // Redirect to FAQs page with search term
                    window.location.href = "{{ route('front.help.faqs') }}?search=" + encodeURIComponent(searchTerm);
                }
            }
        });
    });
</script>
@endsection
