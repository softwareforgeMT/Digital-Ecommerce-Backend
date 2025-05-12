@extends('front.help.layout')

@section('meta_title', "Help Guides" )
@section('meta_description', "Comprehensive guides to help you navigate our platform and make the most of our services" )



@section('help-content')


<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar Navigation -->
        <div class="lg:w-1/4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden sticky top-24 border border-gray-100 dark:border-gray-700">
                <div class="bg-gray-50 dark:bg-gray-700 p-4 border-b border-gray-200 dark:border-gray-600">
                    <h2 class="text-lg font-semibold dark:text-white">Guide Categories</h2>
                </div>
                <nav class="p-4">
                    <ul class="space-y-1">
                        <li>
                            <a href="#getting-started" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Getting Started
                            </a>
                        </li>
                        <li>
                            <a href="#account-management" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Account Management
                            </a>
                        </li>
                        <li>
                            <a href="#orders-payments" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Orders & Payments
                            </a>
                        </li>
                        <li>
                            <a href="#services-features" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Services & Features
                            </a>
                        </li>
                        <li>
                            <a href="#returns-refunds" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Returns & Refunds
                            </a>
                        </li>
                        <li>
                            <a href="#security-privacy" class="block px-4 py-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-purple-900/30 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                Security & Privacy
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <div class="p-4 bg-purple-50 dark:bg-purple-900/20 m-4 rounded-lg">
                    <h3 class="font-medium text-purple-800 dark:text-purple-300 mb-2">Need More Help?</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Can't find what you're looking for? Contact our support team.</p>
                    <a href="mailto:support@example.com" class="inline-flex items-center text-purple-600 dark:text-purple-400 font-medium text-sm">
                        Contact Support
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4">
            <!-- Getting Started Section -->
            <section id="getting-started" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Getting Started</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>Welcome to our platform! This guide will help you get started with our services and make the most of your experience.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Creating Your Account</h3>
                            
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Visit our registration page or click on the "Sign Up" button in the top right corner.</li>
                                <li>Enter your email address, create a strong password, and fill in your personal details.</li>
                                <li>Verify your email address by clicking the link sent to your inbox.</li>
                                <li>Complete your profile by adding additional information and preferences.</li>
                            </ol>
                            
                            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 my-6">
                                <p class="text-blue-800 dark:text-blue-300 text-sm">
                                    <strong>Tip:</strong> Creating a complete profile helps us personalize your experience and offer relevant product recommendations.
                                </p>
                            </div>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Navigating Our Platform</h3>
                            
                            <p>Our platform is designed to be intuitive and user-friendly. Here's how you can navigate it effectively:</p>
                            
                            <ul class="list-disc pl-6 mb-6 space-y-2">
                                <li>Use the top navigation bar to browse product categories.</li>
                                <li>Use the search bar to find specific products or services.</li>
                                <li>Access your account settings, orders, and wishlist from your profile icon.</li>
                                <li>Explore featured products and promotions on our homepage.</li>
                            </ul>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Making Your First Purchase</h3>
                            
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Browse or search for products you're interested in.</li>
                                <li>Click on a product to view its details, specifications, and reviews.</li>
                                <li>Select your desired options (if applicable) and click "Add to Cart".</li>
                                <li>Review your cart, adjust quantities if needed, and proceed to checkout.</li>
                                <li>Enter your shipping and payment information.</li>
                                <li>Review your order summary and confirm your purchase.</li>
                            </ol>
                            
                            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 my-6">
                                <p class="text-green-800 dark:text-green-300 text-sm">
                                    <strong>Success:</strong> After completing your purchase, you'll receive an order confirmation email with all the details.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Account Management Section -->
            <section id="account-management" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Account Management</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>Managing your account is easy with our intuitive user interface. Here's how to handle various aspects of your account settings.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Updating Personal Information</h3>
                            
                            <p>To update your personal information:</p>
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Log in to your account.</li>
                                <li>Click on your profile icon in the top right corner.</li>
                                <li>Select "Account Settings" from the dropdown menu.</li>
                                <li>Click on "Edit Profile" to update your information.</li>
                                <li>Make your changes and click "Save Changes" to confirm.</li>
                            </ol>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Managing Your Addresses</h3>
                            
                            <p>You can save multiple shipping and billing addresses for faster checkout:</p>
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Go to "Account Settings" from your profile dropdown.</li>
                                <li>Click on "Addresses" in the sidebar.</li>
                                <li>To add a new address, click "Add New Address" and fill in the required fields.</li>
                                <li>To edit or delete an existing address, use the appropriate buttons next to the address.</li>
                                <li>You can set a default shipping and billing address by checking the corresponding option.</li>
                            </ol>
                            
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 my-6">
                                <p class="text-yellow-800 dark:text-yellow-300 text-sm">
                                    <strong>Note:</strong> Having your addresses saved makes the checkout process much faster for future orders.
                                </p>
                            </div>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Changing Your Password</h3>
                            
                            <p>For security reasons, we recommend changing your password periodically:</p>
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Go to "Account Settings" from your profile dropdown.</li>
                                <li>Click on "Security" in the sidebar.</li>
                                <li>Enter your current password.</li>
                                <li>Enter your new password and confirm it.</li>
                                <li>Click "Update Password" to save the changes.</li>
                            </ol>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Email Preferences</h3>
                            
                            <p>Manage your email subscriptions and notification preferences:</p>
                            <ol class="list-decimal pl-6 mb-6 space-y-2">
                                <li>Go to "Account Settings" from your profile dropdown.</li>
                                <li>Click on "Notifications" in the sidebar.</li>
                                <li>Toggle the options for different types of notifications.</li>
                                <li>Click "Save Preferences" to confirm your changes.</li>
                            </ol>
                            
                            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 my-6">
                                <p class="text-blue-800 dark:text-blue-300 text-sm">
                                    <strong>Tip:</strong> Keep order notifications enabled to stay updated on your purchase status.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Orders & Payments Section (shortened) -->
            <section id="orders-payments" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Orders & Payments</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>Find detailed information about ordering, payment methods, and tracking your purchases.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Placing an Order</h3>
                            <p>Learn how to navigate our catalog and complete your purchase efficiently.</p>
                            <a href="#" class="text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                Read More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Payment Methods</h3>
                            <p>We accept a variety of payment methods to make your shopping experience convenient.</p>
                            <a href="#" class="text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                Read More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Tracking Your Order</h3>
                            <p>Stay informed about the status of your order from processing to delivery.</p>
                            <a href="#" class="text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                Read More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Remaining sections with shortened content -->
            <section id="services-features" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-pink-500 to-rose-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Services & Features</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>Explore our range of services and platform features designed to enhance your digital commerce experience.</p>
                            
                            <!-- Short content for each subsection -->
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Premium Membership</h3>
                            <p>Discover the benefits of becoming a premium member, including exclusive discounts and early access to new products.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Wishlist Functionality</h3>
                            <p>Save products you're interested in for later and receive notifications about price changes.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Product Reviews</h3>
                            <p>Learn how to leave helpful reviews and contribute to our community of informed shoppers.</p>
                            
                            <a href="#" class="mt-4 text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                View Complete Services Guide
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="returns-refunds" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-yellow-500 to-amber-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Returns & Refunds</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>We want you to be completely satisfied with your purchase. Learn about our return and refund policies.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Return Policy</h3>
                            <p>Find out which items are eligible for return and the timeframe for initiating returns.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Refund Process</h3>
                            <p>Learn how refunds are processed and how long it takes for funds to appear in your account.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Exchange Options</h3>
                            <p>Discover how to exchange items for different sizes, colors, or models.</p>
                            
                            <a href="#" class="mt-4 text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                View Complete Returns Guide
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="security-privacy" class="mb-16 scroll-mt-24">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-red-500 to-orange-500 p-6">
                        <h2 class="text-2xl font-bold text-white">Security & Privacy</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <p>Your security and privacy are our top priorities. Learn how we protect your information and keep your account secure.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Data Protection</h3>
                            <p>Understand how we collect, use, and protect your personal information.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Account Security</h3>
                            <p>Discover best practices for keeping your account secure, including two-factor authentication.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-900 dark:text-white">Payment Security</h3>
                            <p>Learn about the encryption and security measures we use to protect your payment information.</p>
                            
                            <a href="#" class="mt-4 text-purple-600 dark:text-purple-400 font-medium inline-flex items-center">
                                View Complete Security Guide
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Still Need Help Banner -->
    <div class="mt-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-8 text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Still Have Questions?</h2>
        <p class="text-white/90 mb-6 max-w-2xl mx-auto">If you couldn't find answers to your questions in our guides, our support team is ready to help you.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('front.help.faqs') }}" class="px-6 py-3 bg-white text-purple-700 font-medium rounded-lg hover:bg-purple-50 transition-colors">
                Browse FAQs
            </a>
            <a href="mailto:support@example.com" class="px-6 py-3 bg-purple-700 text-white font-medium rounded-lg hover:bg-purple-800 transition-colors">
                Contact Support
            </a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 96, // Adjust offset as needed
                        behavior: 'smooth'
                    });
                    
                    // Update URL without scrolling
                    history.pushState(null, null, targetId);
                }
            });
        });
        
        // Handle initial hash navigation
        if (window.location.hash) {
            const targetElement = document.querySelector(window.location.hash);
            
            if (targetElement) {
                setTimeout(() => {
                    window.scrollTo({
                        top: targetElement.offsetTop - 96,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        }
    });
</script>
@endsection
