@extends('front.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4 space-y-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 shadow">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="text-white mb-4 md:mb-0">
                        <h1 class="text-2xl font-bold">Welcome back, {{ auth()->user()->name }}!</h1>
                        <p class="opacity-90 mt-1">Here's what's happening with your account</p>
                    </div>
                    <a href="{{ route('front.products.index') }}" class="bg-white text-purple-700 hover:bg-purple-50 px-4 py-2 rounded-lg shadow-sm transition-colors duration-150 flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Browse Products</span>
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Orders -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 w-12 h-12 flex items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400">
                                <i class="fas fa-shopping-bag text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Orders</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalOrders }}</p>
                                    @if($recentOrdersCount > 0)
                                        <span class="ml-2 text-xs text-green-600 dark:text-green-400">
                                            +{{ $recentOrdersCount }} this month
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-3">
                        <a href="{{ route('user.orders.index') }}" class="text-sm text-purple-600 dark:text-purple-400 font-medium flex items-center hover:text-purple-800 dark:hover:text-purple-300 transition">
                            View all orders
                            <i class="fas fa-chevron-right ml-auto text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Total Spent -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400">
                                <i class="fas fa-dollar-sign text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Spent</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ Helpers::formatPrice($totalSpent) }}</p>
                                    @if($avgOrderValue > 0)
                                        <span class="ml-2 text-xs text-gray-500 dark:text-gray-400">
                                            ~{{ Helpers::formatPrice($avgOrderValue) }}/order
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-3">
                        @if($pendingOrders > 0)
                            <span class="text-sm text-amber-600 dark:text-amber-400 font-medium flex items-center">
                                {{ $pendingOrders }} {{ Str::plural('order', $pendingOrders) }} Processing
                                <i class="fas fa-clock ml-auto text-xs"></i>
                            </span>
                        @else
                            <span class="text-sm text-gray-500 dark:text-gray-400 font-medium flex items-center">
                                No pending orders
                                <i class="fas fa-check-circle ml-auto text-green-500 text-xs"></i>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Account Status -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400">
                                <i class="fas fa-user-circle text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Status</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ auth()->user()->status==true?'Active':'Deactivated' }}</p>
                                    <span class="ml-2 text-xs text-gray-500 dark:text-gray-400">
                                        Since {{ auth()->user()->created_at->format('M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-3">
                        <a href="{{ route('user.profile') }}" class="text-sm text-purple-600 dark:text-purple-400 font-medium flex items-center hover:text-purple-800 dark:hover:text-purple-300 transition">
                            View profile details
                            <i class="fas fa-chevron-right ml-auto text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white">Recent Orders</h2>
                    @if($recentOrders->isNotEmpty())
                        <a href="{{ route('user.orders.index') }}" class="text-sm text-purple-600 dark:text-purple-400 font-semibold hover:text-purple-800 dark:hover:text-purple-300">
                            View All
                        </a>
                    @endif
                </div>
                
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($recentOrders as $order)
                        <a href="{{ route('user.orders.show', $order->order_number) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <div class="px-6 py-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 rounded-md bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center text-purple-600 dark:text-purple-400">
                                            <i class="fas fa-shopping-bag"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Order #{{ $order->order_number }}</p>
                                        <div class="flex items-center mt-1">
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at->format('M d, Y') }}</p>
                                            <span class="mx-2 text-gray-400">•</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $order->orderItems->count() }} {{ Str::plural('item', $order->orderItems->count()) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right flex flex-col items-end">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Helpers::formatPrice($order->total) }}</p>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <!-- Order Status Badge -->
                                        <div class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                            @if($order->status === 'completed') bg-green-100 text-green-800 border border-green-200 dark:bg-green-900/50 dark:text-green-300 dark:border-green-800
                                            @elseif($order->status === 'processing') bg-blue-100 text-blue-800 border border-blue-200 dark:bg-blue-900/50 dark:text-blue-300 dark:border-blue-800
                                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800 border border-red-200 dark:bg-red-900/50 dark:text-red-300 dark:border-red-800
                                            @else bg-gray-100 text-gray-800 border border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600
                                            @endif">
                                            <svg class="w-3 h-3 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                @if($order->status === 'completed')
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                @elseif($order->status === 'processing')
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                @elseif($order->status === 'cancelled')
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                            <span>{{ ucfirst($order->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 mb-4">
                                <i class="fas fa-shopping-bag text-gray-500 dark:text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-gray-900 dark:text-white font-medium mb-1">No Orders Yet</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">You haven't placed any orders yet.</p>
                            <a href="{{ route('front.products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                                Browse Products
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
