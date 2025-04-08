@extends('front.help.layout')

@section('help-content')
<div class="p-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-3">Frequently Asked Questions</h2>
        <p class="text-gray-400">Find answers to common questions about our products and services.</p>
    </div>

    <!-- Quick Categories -->
    <div class="grid grid-cols-3 gap-4 mb-8">
        @php
            $categories = [
                [
                    'name' => 'Products & Features',
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    'count' => '3 articles'
                ],
                [
                    'name' => 'Billing & Payments',
                    'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'count' => '3 articles'
                ],
                [
                    'name' => 'Technical Support',
                    'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'count' => '2 articles'
                ]
            ];
        @endphp

        @foreach($categories as $category)
        <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
            <div class="flex items-center space-x-3">
                <div class="bg-purple-500/10 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium">{{ $category['name'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $category['count'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- FAQ Sections -->
    <div class="space-y-6">
        <!-- Product & Features Section -->
        <div class="card-glow rounded-xl overflow-hidden">
            <div class="bg-purple-500/5 p-6 border-b border-purple-500/20">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <h3 class="text-xl font-bold">Products & Features</h3>
                </div>
            </div>
            <div class="p-6 space-y-4">
                @php
                    $productFaqs = [
                        [
                            'id' => 'faq1',
                            'question' => 'How secure are your gaming products?',
                            'answer' => 'Our products employ advanced kernel-level protection and regular security updates. We use sophisticated anti-detection methods and maintain continuous monitoring to ensure maximum security for our users.'
                        ],
                        [
                            'id' => 'faq2',
                            'question' => 'What games do you currently support?',
                            'answer' => 'We currently support major titles including Modern Warfare, Warzone, Apex Legends, CS2, and other popular FPS games. Our product list is regularly updated based on community demand and game updates.'
                        ],
                        [
                            'id' => 'faq3',
                            'question' => 'How often do you update your products?',
                            'answer' => 'We provide updates within 24 hours of any major game patch. Our team constantly monitors game changes to ensure minimal downtime and maximum compatibility.'
                        ]
                    ];
                @endphp

                @foreach($productFaqs as $faq)
                <div class="bg-purple-500/5 rounded-lg border border-purple-500/20 overflow-hidden transition-all duration-200 hover:border-purple-500/40">
                    <button class="w-full flex justify-between items-center p-4" onclick="toggleFaq('{{ $faq['id'] }}')">
                        <h4 class="font-medium text-left">{{ $faq['question'] }}</h4>
                        <svg class="w-5 h-5 transform transition-transform" id="{{ $faq['id'] }}-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="hidden px-4 pb-4 text-gray-400" id="{{ $faq['id'] }}-content">
                        {{ $faq['answer'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Subscription & Billing Section -->
        <div class="card-glow rounded-xl overflow-hidden">
            <div class="bg-purple-500/5 p-6 border-b border-purple-500/20">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-xl font-bold">Billing & Payments</h3>
                </div>
            </div>
            <div class="p-6 space-y-4">
                @php
                    $billingFaqs = [
                        [
                            'id' => 'faq4',
                            'question' => 'What payment methods do you accept?',
                            'answer' => 'We accept major credit cards, cryptocurrency (BTC, ETH), and various other payment methods. All transactions are processed securely and discretely.'
                        ],
                        [
                            'id' => 'faq5',
                            'question' => 'Do you offer refunds?',
                            'answer' => 'We offer refunds within 24 hours of purchase if the product is unused. Please contact our support team through Discord for refund requests.'
                        ],
                        [
                            'id' => 'faq6',
                            'question' => 'How do subscriptions work?',
                            'answer' => 'Subscriptions are automatically renewed based on your chosen plan (daily, weekly, or monthly). You can cancel anytime through your dashboard.'
                        ]
                    ];
                @endphp

                @foreach($billingFaqs as $faq)
                <div class="bg-purple-500/5 rounded-lg border border-purple-500/20 overflow-hidden transition-all duration-200 hover:border-purple-500/40">
                    <button class="w-full flex justify-between items-center p-4" onclick="toggleFaq('{{ $faq['id'] }}')">
                        <h4 class="font-medium text-left">{{ $faq['question'] }}</h4>
                        <svg class="w-5 h-5 transform transition-transform" id="{{ $faq['id'] }}-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="hidden px-4 pb-4 text-gray-400" id="{{ $faq['id'] }}-content">
                        {{ $faq['answer'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Technical Support Section -->
        <div class="card-glow rounded-xl overflow-hidden">
            <div class="bg-purple-500/5 p-6 border-b border-purple-500/20">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-xl font-bold">Technical Support</h3>
                </div>
            </div>
            <div class="p-6 space-y-4">
                @php
                    $supportFaqs = [
                        [
                            'id' => 'faq7',
                            'question' => 'How do I get technical support?',
                            'answer' => 'Our primary support channel is Discord, where we provide 24/7 assistance. Join our Discord server and create a ticket in the appropriate channel.'
                        ],
                        [
                            'id' => 'faq8',
                            'question' => 'What is your average response time?',
                            'answer' => 'We typically respond to support tickets within 15-30 minutes. Premium members receive priority support with faster response times.'
                        ]
                    ];
                @endphp

                @foreach($supportFaqs as $faq)
                <div class="bg-purple-500/5 rounded-lg border border-purple-500/20 overflow-hidden transition-all duration-200 hover:border-purple-500/40">
                    <button class="w-full flex justify-between items-center p-4" onclick="toggleFaq('{{ $faq['id'] }}')">
                        <h4 class="font-medium text-left">{{ $faq['question'] }}</h4>
                        <svg class="w-5 h-5 transform transition-transform" id="{{ $faq['id'] }}-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="hidden px-4 pb-4 text-gray-400" id="{{ $faq['id'] }}-content">
                        {{ $faq['answer'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    
</div>
@endsection

@section('script')
<script>
    function toggleFaq(id) {
        const content = document.getElementById(`${id}-content`);
        const icon = document.getElementById(`${id}-icon`);
        const button = icon.closest('button');
        
        if (content && icon) {
            // Toggle content visibility
            content.classList.toggle('hidden');
            
            // Toggle icon rotation
            icon.classList.toggle('rotate-180');
            
            // Toggle button active state
            button.classList.toggle('text-purple-400');
            
            // Add smooth transition
            content.style.maxHeight = content.classList.contains('hidden') ? '0px' : content.scrollHeight + 'px';
        }
    }
</script>

<style>
    .faq-item {
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 0.5rem;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }

    .faq-item button {
        width: 100%;
        padding: 1rem;
        transition: all 0.3s ease;
    }

    .faq-item button:hover {
        background: rgba(139, 92, 246, 0.05);
    }

    .faq-item div[id$="-content"] {
        padding: 0 1rem 1rem;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .faq-item div[id$="-content"]:not(.hidden) {
        max-height: 500px;
        transition: max-height 0.3s ease-in;
    }
</style>
@endsection
