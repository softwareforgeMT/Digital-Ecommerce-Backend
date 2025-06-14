@extends('front.help.layout')

@section('meta_title', 'Product Warranty Terms')
@section('meta_description', 'Learn about our comprehensive product warranty coverage and terms.')

@section('help-content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-8">
            <!-- Page Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Product Warranty Terms</h1>
                <p class="text-gray-600 dark:text-gray-400">Our commitment to product quality and customer satisfaction</p>
            </div>

            <!-- Key Points Summary -->
            <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-purple-900 dark:text-purple-100 mb-4">Key Coverage Points</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">30-day satisfaction guarantee</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">1-year warranty against manufacturing defects</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Free repairs for covered issues</span>
                    </li>
                </ul>
            </div>

            <!-- Video Guide -->
            <div class="aspect-w-16 aspect-h-9 mb-8">
                <iframe class="rounded-lg w-full h-[400px]" 
                        src="https://www.youtube.com/embed/YOUR_VIDEO_ID" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>


@php
$warrantyInfo = [
    'header' => [
        'title' => 'Warranty Coverage',
        'subtitle' => 'Comprehensive protection for your purchase',
        'icon' => 'fas fa-shield-alt',
        'description' => 'Our standard warranty covers all manufacturing defects and malfunctions under normal use conditions for a period of <span class="font-semibold text-yellow-300">one year</span> from the date of purchase.',
    ],
    'coverage' => [
        'covered' => [
            'title' => "What's Covered",
            'icon' => 'fas fa-check',
            'color' => 'green',
            'items' => [
                'Manufacturing defects affecting product functionality',
                'Material defects under normal use conditions',
                'Electronic component failures (where applicable)',
                'Structural integrity issues',
            ],
        ],
        'notCovered' => [
            'title' => "What's Not Covered",
            'icon' => 'fas fa-times',
            'color' => 'red',
            'items' => [
                'Damage from misuse or accidents',
                'Normal wear and tear',
                'Unauthorized modifications',
                'Damage from improper maintenance',
            ],
        ],
    ],
    'claimSteps' => [
        ['title' => 'Contact Support', 'desc' => 'Contact our customer service team'],
        ['title' => 'Provide Details', 'desc' => 'Provide your order number and product details'],
        ['title' => 'Describe Issue', 'desc' => 'Describe the issue in detail'],
        ['title' => 'Include Media', 'desc' => 'Include photos or video of the problem if possible'],
    ],
    'returnPolicy' => [
        'title' => 'Return Policy',
        'icon' => 'fas fa-undo',
        'highlight' => '30-Day Satisfaction Guarantee',
        'desc' => "We offer a 30-day satisfaction guarantee. If you're not completely satisfied with your purchase, you can return it within 30 days for a full refund.",
    ],
    'support' => [
        'title' => 'Contact Support',
        'subtitle' => 'For warranty claims or questions',
        'icon' => 'fas fa-headset',
        'methods' => [
            ['icon' => 'fas fa-envelope', 'label' => 'Email', 'value' => '<a href="mailto:' . $gs->from_email . '" class="underline">' . $gs->from_email . '</a>'],
            ['icon' => 'fas fa-phone', 'label' => 'Phone', 'value' => '1-800-WARRANTY'],
            ['icon' => 'fas fa-clock', 'label' => 'Hours', 'value' => 'Monday-Friday<br>9am-5pm EST'],
        ],
    ],
];
@endphp

<!-- Warranty Header -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 text-white">
    <div class="flex items-center mb-4">
        <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mr-4">
            <i class="{{ $warrantyInfo['header']['icon'] }} text-xl"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold">{{ $warrantyInfo['header']['title'] }}</h2>
            <p class="text-white/90 text-sm">{{ $warrantyInfo['header']['subtitle'] }}</p>
        </div>
    </div>
    <div class="bg-white/10 rounded-lg p-4">
        <p class="text-white/95">{!! $warrantyInfo['header']['description'] !!}</p>
    </div>
</div>

<!-- Coverage Loop -->
<div class="grid md:grid-cols-2 gap-6 mt-8">
    @foreach(['covered', 'notCovered'] as $key)
        @php $section = $warrantyInfo['coverage'][$key]; @endphp
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-{{ $section['color'] }}-50 dark:bg-{{ $section['color'] }}-900/20 px-6 py-4 border-b border-{{ $section['color'] }}-200 dark:border-{{ $section['color'] }}-800">
                <div class="flex items-center">
                    <div class="bg-{{ $section['color'] }}-100 dark:bg-{{ $section['color'] }}-900/50 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                        <i class="{{ $section['icon'] }} text-{{ $section['color'] }}-600 dark:text-{{ $section['color'] }}-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-{{ $section['color'] }}-800 dark:text-{{ $section['color'] }}-300">{{ $section['title'] }}</h3>
                </div>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    @foreach($section['items'] as $item)
                        <li class="flex items-start">
                            <div class="bg-{{ $section['color'] }}-100 dark:bg-{{ $section['color'] }}-900/50 rounded-full w-6 h-6 flex items-center justify-center mr-3  flex-shrink-0">
                                <i class="{{ $section['icon'] }} text-xs text-{{ $section['color'] }}-600 dark:text-{{ $section['color'] }}-400"></i>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 text-sm">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>

<!-- Claim Steps -->
<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 mt-8">
    <div class="bg-blue-50 dark:bg-blue-900/20 px-6 py-4 border-b border-blue-200 dark:border-blue-800">
        <div class="flex items-center">
            <div class="bg-blue-100 dark:bg-blue-900/50 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                <i class="fas fa-clipboard-list text-blue-600 dark:text-blue-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-blue-800 dark:text-blue-300">Making a Warranty Claim</h3>
        </div>
    </div>
    <div class="p-6">
        <p class="text-gray-600 dark:text-gray-400 mb-6">To make a warranty claim, please follow these steps:</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($warrantyInfo['claimSteps'] as $index => $step)
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 text-center">
                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 dark:text-blue-400 font-bold text-lg">{{ $index + 1 }}</span>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">{{ $step['title'] }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Return Policy -->
<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 mt-8">
    <div class="bg-purple-50 dark:bg-purple-900/20 px-6 py-4 border-b border-purple-200 dark:border-purple-800">
        <div class="flex items-center">
            <div class="bg-purple-100 dark:bg-purple-900/50 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                <i class="{{ $warrantyInfo['returnPolicy']['icon'] }} text-purple-600 dark:text-purple-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-purple-800 dark:text-purple-300">{{ $warrantyInfo['returnPolicy']['title'] }}</h3>
        </div>
    </div>
    <div class="p-6">
        <div class="flex items-start">
            <div class="bg-purple-100 dark:bg-purple-900/50 rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                <i class="fas fa-calendar-check text-purple-600 dark:text-purple-400"></i>
            </div>
            <div>
                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">{{ $warrantyInfo['returnPolicy']['highlight'] }}</h4>
                <p class="text-gray-600 dark:text-gray-400">{{ $warrantyInfo['returnPolicy']['desc'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Contact Support -->
<div class="bg-gradient-to-r from-gray-800 to-gray-900 dark:from-gray-700 dark:to-gray-800 rounded-xl p-6 text-white mt-8">
    <div class="flex items-center mb-6">
        <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mr-4">
            <i class="{{ $warrantyInfo['support']['icon'] }} text-xl"></i>
        </div>
        <div>
            <h3 class="text-xl font-semibold">{{ $warrantyInfo['support']['title'] }}</h3>
            <p class="text-white/80 text-sm">{{ $warrantyInfo['support']['subtitle'] }}</p>
        </div>
    </div>
    <div class="grid sm:grid-cols-3 gap-4">
    @foreach($warrantyInfo['support']['methods'] as $method)
        <div class="bg-white/10 rounded-lg p-4 text-center">
            <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                <i class="{{ $method['icon'] }} text-white"></i>
            </div>
            <h4 class="font-medium mb-1">{{ $method['label'] }}</h4>
            <p class="text-white/80 text-sm break-words max-w-full">{!! $method['value'] !!}</p>
        </div>
    @endforeach
</div>

</div>



           
        </div>
    </div>
@endsection
