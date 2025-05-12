@extends('front.help.layout')

@section('meta_title', "Frequently Asked Questions" )
@section('meta_description', "Find answers to common questions about our products, services, ordering, shipping, and more." )



@section('help-content')


<div class="container mx-auto px-4 py-12" x-data="{ activeCategory: 'all', searchQuery: '{{ request('search') }}' }">
    <!-- Search Bar -->
    <div class="max-w-3xl mx-auto mb-10">
        <form action="{{ route('front.help.faqs') }}" method="GET" class="relative">
            <input type="text" 
                   name="search"
                   x-model="searchQuery"
                   class="w-full pl-12 pr-4 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 dark:text-white"
                   placeholder="Search FAQs..."
                   value="{{ request('search') }}">
            <div class="absolute left-4 top-1/2 -translate-y-1/2">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                Search
            </button>
        </form>
    </div>

    <!-- FAQ Categories Tabs -->
    <div class="mb-8 flex flex-wrap justify-center gap-2">
        <button @click="activeCategory = 'all'" 
                :class="activeCategory === 'all' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            All FAQs
        </button>
        <button @click="activeCategory = 'general'" 
                :class="activeCategory === 'general' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            General
        </button>
        <button @click="activeCategory = 'account'" 
                :class="activeCategory === 'account' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            Account
        </button>
        <button @click="activeCategory = 'orders'" 
                :class="activeCategory === 'orders' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            Orders
        </button>
        <button @click="activeCategory = 'payments'" 
                :class="activeCategory === 'payments' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            Payments
        </button>
        <button @click="activeCategory = 'shipping'" 
                :class="activeCategory === 'shipping' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            Shipping
        </button>
        <button @click="activeCategory = 'returns'" 
                :class="activeCategory === 'returns' ? 'bg-purple-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-purple-100 dark:hover:bg-gray-700'"
                class="px-5 py-2 rounded-full font-medium transition-colors">
            Returns
        </button>
    </div>

    <!-- FAQs Accordions -->
    <div class="max-w-4xl mx-auto">
        <!-- General FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'general'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">General Questions</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="general">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">What is Digital Commerce?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Digital Commerce is a premium online marketplace that specializes in high-quality digital products, services, and solutions. We offer a wide range of products from trusted brands and partners, all carefully selected to ensure the best quality and value for our customers.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="general">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How do I contact customer support?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                You can contact our customer support team through multiple channels:<br>
                                • Email: support@digitalcommerce.com<br>
                                • Live Chat: Available on our website during business hours (9am-5pm EST, Monday-Friday)<br>
                                • Phone: +1-800-123-4567<br>
                                • Contact Form: Available on our Contact Us page
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="general">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">What are your business hours?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Our website is available 24/7 for browsing and shopping. Our customer support team is available from 9am to 5pm EST, Monday through Friday. While our physical office may be closed on weekends and holidays, our automated systems continue to process orders.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'account'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Account & Registration</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="account">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How do I create an account?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Creating an account is easy! Click on the "Sign Up" button at the top right of our website. Fill in your email address, create a password, and provide your name. You'll receive a verification email to confirm your account. Once verified, you can start shopping right away.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="account">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How do I reset my password?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                If you've forgotten your password, click the "Sign In" button and then select "Forgot Password." Enter the email address associated with your account, and we'll send you a password reset link. Follow the instructions in the email to create a new password. For security reasons, reset links are valid for 24 hours.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="account">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Can I update my account information?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Yes, you can update your account information at any time. Sign in to your account, go to "Account Settings," and you can update your personal information, change your password, manage addresses, and adjust notification preferences. Remember to click "Save Changes" after making your updates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'orders'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Orders & Tracking</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="orders">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How can I track my order?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                You can track your order by going to "My Orders" in your account dashboard. Click on the specific order you want to track, and you'll see its current status. Once your order has shipped, you'll receive a shipping confirmation email with a tracking number and link to monitor your package's journey directly from the carrier's website.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="orders">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Can I modify or cancel my order?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                You can modify or cancel your order if it hasn't been processed yet. Go to "My Orders" in your account, select the order, and look for the "Cancel Order" option. If this option isn't available, your order is already being processed. In such cases, please contact our customer support team immediately, and we'll do our best to accommodate your request.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="faq-item" data-category="orders">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">What if my order arrives damaged?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                We're sorry to hear if your product arrived damaged. Please take photos of the damaged items and packaging. Contact our customer support within 48 hours of receiving the order. We'll arrange a replacement or refund, depending on your preference and product availability. You won't need to return the damaged item in most cases.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'payments'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Payments & Pricing</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Items for Payments -->
                    <div x-data="{ open: false }" class="faq-item" data-category="payments">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">What payment methods do you accept?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                We accept a variety of payment methods to make your shopping experience convenient:<br>
                                • Credit/Debit Cards: Visa, MasterCard, American Express, Discover<br>
                                • Digital Wallets: PayPal, Apple Pay, Google Pay<br>
                                • Bank Transfers<br>
                                • Cryptocurrency (Bitcoin, Ethereum)<br>
                                All payment methods use secure encryption to protect your financial information.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="payments">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Are there any hidden fees?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                We believe in transparent pricing. The price you see is the price you pay, plus any applicable taxes and shipping costs which are clearly displayed before you complete your purchase. There are no hidden fees or surcharges. If you choose expedited shipping or international delivery, additional fees will be clearly shown during checkout.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="payments">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How do I use a discount code?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                To use a discount code, add items to your cart and proceed to checkout. On the checkout page, look for the "Discount Code" or "Promo Code" field. Enter your code and click "Apply". The discount will be automatically calculated and shown in your order summary. Please note that some discount codes cannot be combined with other promotions, and most codes have expiration dates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Shipping FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'shipping'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Shipping & Delivery</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Items for Shipping -->
                    <div x-data="{ open: false }" class="faq-item" data-category="shipping">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How long will it take to receive my order?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Shipping times vary based on your location and shipping method selected:<br>
                                • Standard shipping: 3-7 business days<br>
                                • Express shipping: 2-3 business days<br>
                                • Next-day delivery: 1 business day (order must be placed before 2 PM EST)<br>
                                International shipping times vary by destination. The estimated delivery date will be shown during checkout.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="shipping">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Do you ship internationally?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Yes, we ship to over 100 countries worldwide. International shipping costs are calculated during checkout based on destination, package weight, and shipping method. Please be aware that international orders may be subject to import duties, taxes, and customs fees imposed by the destination country. These additional charges are the responsibility of the recipient.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="shipping">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Can I change my shipping address after placing an order?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Address changes can only be made if your order hasn't been processed yet. Please contact our customer support team immediately if you need to change your shipping address. Once an order has been shipped, we cannot change the delivery address. For security reasons, we may require identity verification before making changes to shipping addresses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Returns FAQs -->
        <div x-show="activeCategory === 'all' || activeCategory === 'returns'" class="mb-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Returns & Refunds</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- FAQ Items for Returns -->
                    <div x-data="{ open: false }" class="faq-item" data-category="returns">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">What is your return policy?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                We offer a 30-day return policy on most items. Products must be in their original condition with tags attached and original packaging. Some products like digital downloads, personalized items, and clearance items may not be eligible for return. To start a return, go to "My Orders" in your account and select the "Return Item" option for the relevant order.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="returns">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">How long do refunds take to process?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Once we receive your returned item, we'll inspect it and process your refund within 3-5 business days. After we process the refund, it may take an additional 5-10 business days for the funds to appear in your account, depending on your payment method and financial institution. Credit card refunds typically take 5-7 business days, while bank transfers may take 7-10 business days.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="faq-item" data-category="returns">
                        <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left font-medium focus:outline-none">
                            <span class="text-gray-900 dark:text-white">Do you offer exchanges?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Yes, we offer exchanges for items that are in stock. To request an exchange, follow the same process as returns and select "Exchange" instead of "Refund" when prompted. Specify the variant (size, color, etc.) you'd like to receive. If the replacement item costs more than your original purchase, you'll need to pay the difference. If it costs less, we'll refund the difference.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Still Need Help Section -->
    <div class="max-w-4xl mx-auto mt-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-8 text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Still Have Questions?</h2>
        <p class="text-white/90 mb-6 max-w-2xl mx-auto">Our support team is always ready to help with your questions and concerns.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="mailto:support@example.com" class="px-6 py-3 bg-white text-purple-700 font-medium rounded-lg hover:bg-purple-50 transition-colors">
                Email Support
            </a>
            <a href="#" class="px-6 py-3 bg-purple-700 text-white font-medium rounded-lg hover:bg-purple-800 transition-colors">
                Live Chat
            </a>
            <a href="tel:+1234567890" class="px-6 py-3 bg-white/20 text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                Call Us
            </a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // If there's a search query, expand all FAQs that match
        const searchQuery = '{{ request('search') }}';
        if (searchQuery) {
            // This would require server-side processing to pre-highlight matches
            // For now, just show a message if the search term exists
            
            // Alternative: client-side search highlight (basic version)
            const faqItems = document.querySelectorAll('.faq-item');
            let matchFound = false;
            
            faqItems.forEach(item => {
                const questionText = item.querySelector('button span').innerText.toLowerCase();
                const answerText = item.querySelector('[x-show="open"]').innerText.toLowerCase();
                
                if (questionText.includes(searchQuery.toLowerCase()) || 
                    answerText.includes(searchQuery.toLowerCase())) {
                    // Trigger the click event on the button
                    matchFound = true;
                    // For Alpine.js we need to set the x-data value
                    // This is a hacky way since we don't have direct access to Alpine data
                    setTimeout(() => {
                        item.querySelector('button').click();
                    }, 100);
                }
            });
            
            if (!matchFound) {
                // Could show a "no results" message
                console.log('No FAQs match your search');
            }
        }
    });
</script>
@endsection
