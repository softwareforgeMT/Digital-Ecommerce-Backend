@extends('front.layouts.app')

@section('meta_title', 'My Profile')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4 space-y-8">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 shadow">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="relative">
                        @if($data->photo && $data->photo != 'user.png')
                            <img src="{{ Helpers::image(auth()->user()->photo, 'user/avatar/', 'user.png') }}"
                                 alt="{{ $data->name }}"
                                 class="w-24 h-24 rounded-full object-cover border-4 border-white">
                        @else
                            <div class="w-24 h-24 rounded-full bg-white text-purple-700 flex items-center justify-center text-4xl font-bold">
                                {{ substr($data->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="text-white text-center md:text-left">
                        <h1 class="text-3xl font-bold">{{ $data->name }}</h1>
                        <p class="opacity-90 mt-1">{{ $data->email }}</p>
                        <div class="mt-4">
                            <a href="{{ route('user.account-settings') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-6 dark:text-white flex items-center">
                        <i class="fas fa-user-circle mr-3 text-purple-500"></i>
                        Personal Information
                    </h2>

                    <div class="space-y-4">
                        <div class="flex border-b border-gray-200 dark:border-gray-700 pb-4">
                            <span class="font-medium w-1/3 text-gray-600 dark:text-gray-400">Full Name</span>
                            <span class="w-2/3 dark:text-white">{{ $data->name }}</span>
                        </div>
                        <div class="flex border-b border-gray-200 dark:border-gray-700 pb-4">
                            <span class="font-medium w-1/3 text-gray-600 dark:text-gray-400">Email</span>
                            <span class="w-2/3 dark:text-white">{{ $data->email }}</span>
                        </div>
                        <div class="flex border-b border-gray-200 dark:border-gray-700 pb-4">
                            <span class="font-medium w-1/3 text-gray-600 dark:text-gray-400">Phone</span>
                            <span class="w-2/3 dark:text-white">{{ $data->phone ?? 'Not provided' }}</span>
                        </div>
                        <div class="flex border-b border-gray-200 dark:border-gray-700 pb-4">
                            <span class="font-medium w-1/3 text-gray-600 dark:text-gray-400">Gender</span>
                            <span class="w-2/3 dark:text-white">{{ ucfirst($data->gender ?? 'Not provided') }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium w-1/3 text-gray-600 dark:text-gray-400">Member Since</span>
                            <span class="w-2/3 dark:text-white">{{ $data->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Account Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-6 dark:text-white flex items-center">
                        <i class="fas fa-chart-line mr-3 text-purple-500"></i>
                        Account Statistics
                    </h2>
                    <div class="space-y-6">
                        <!-- Order Stats -->
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center">
                                <i class="fas fa-shopping-bag text-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Orders</h3>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $data->orders->count() }}</p>
                            </div>
                        </div>
                        
                        <!-- Account Age -->
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Age</h3>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $data->created_at->diffForHumans(null, true) }}</p>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 flex items-center justify-center">
                                <i class="fas fa-user-shield text-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Status</h3>
                                <div class="flex items-center mt-1">
                                    <span class="px-2.5 py-1.5 text-xs font-medium rounded-full 
                                        {{ $data->status == true ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400' }}">
                                        {{ $data->status==true?'Active':'Deactivated' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white">Recent Orders</h2>
                    <a href="{{ route('user.orders.index') }}" class="text-sm text-purple-600 dark:text-purple-400 font-semibold hover:text-purple-800 dark:hover:text-purple-300">
                        View All
                    </a>
                </div>
                
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($data->orders()->latest()->take(3)->get() as $order)
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
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right flex flex-col items-end">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Helpers::setCurrency($order->total) }}</p>
                                    <div class="flex gap-1 mt-1">
                                        <span class="inline-flex px-2 py-0.5 text-xs font-semibold rounded-full
                                            @if($order->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                            @elseif($order->status === 'processing') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                            @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
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
