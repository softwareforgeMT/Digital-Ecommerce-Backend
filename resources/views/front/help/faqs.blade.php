@extends('front.help.layout')

@section('meta_title', 'Frequently Asked Questions')
@section('meta_description', 'Find answers to commonly asked questions about our products, services, warranties, and more.')

@section('help-content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-8">
            <!-- Page Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Frequently Asked Questions</h1>
                <p class="text-gray-600 dark:text-gray-400">Find answers to the most common questions about our products and services</p>
            </div>

            <!-- FAQ Accordion -->
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                <!-- FAQ Item 1 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Do your Xbox 360 consoles come with a clean Key Vault (KV)?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            Yes – Unless otherwise stated, all Xbox 360 consoles come with a valid, unbanned Key Vault (KV).
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            What's pre-installed on the Xbox 360 hard drive?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            All hard drives come fully loaded and ready to use out of the box. No additional downloads are required.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Can I get a list of the installed games?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-red-600 dark:text-red-400 font-bold mr-2">❌</span>
                            No
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Do I need a JTAG or an RGH console?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            No – An RGH system works the same as a JTAG for all practical purposes.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            What happens if I have an issue with a console I bought?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            If the problem cannot be resolved remotely, you can send the console back for repair or replacement.
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                            <span class="text-yellow-600 dark:text-yellow-400 font-bold mr-2">⚠️</span>
                            Note: If the issue was caused by user damage, a service or replacement fee may apply.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            How long is the warranty?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            If you're a Patreon member at the 32-Bit Collector or 128-Bit Archivist tier, you receive lifetime warranty.
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                            <span class="text-blue-600 dark:text-blue-400 font-bold mr-2">🕒</span>
                            All other purchases include a 1-year warranty from the date of purchase.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Who covers the return postage costs?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            Patreon members (32-Bit Collector or 128-Bit Archivist) get free return shipping both ways all booked by us.
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                            <span class="text-blue-600 dark:text-blue-400 font-bold mr-2">📦</span>
                            Non-members cover the cost of returning the item to us; we will cover the return shipping back to you.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 8 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            What is the JJP page?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-blue-600 dark:text-blue-400 font-bold mr-2">📦</span>
                            The Just Pay Postage (JJP) page features a variety of items like controllers, parts, and more — all you pay is the postage.
                        </p>
                        <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                            <span class="text-blue-600 dark:text-blue-400 font-bold mr-2">🕓</span>
                            Patreon members get early access to grab limited drops before anyone else. It's our way of saying thanks for your support!
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 9 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Where does your database information come from?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-blue-600 dark:text-blue-400 font-bold mr-2">📚</span>
                            Our information is sourced from trusted individuals and former insiders — for example, Xbox data often comes from ex staff and other documented sources.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 10 -->
                <div class="py-6" x-data="{ open: false }">
                    <button @click="open = !open" class="flex w-full justify-between items-start text-left">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                             
                            Do you use an ultrasonic cleaner for repairs?
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div class="mt-3 transition-all max-h-0 overflow-hidden" :class="{'max-h-96': open}">
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="text-green-600 dark:text-green-400 font-bold mr-2">✅</span>
                            Yes – Especially on boards that have had BGA work done, we use ultrasonic cleaning to ensure a deep, safe clean.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mt-12 bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Still have questions?</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">If you couldn't find the answer to your question, feel free to contact our support team.</p>
                <a href="{{ route('user.tickets.create') }}" class="inline-flex items-center px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    Contact Support
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // Alpine.js is included in the main layout
    document.addEventListener('alpine:init', () => {
        // Nothing needed here - Alpine.js components are defined inline
    });
</script>
@endsection
