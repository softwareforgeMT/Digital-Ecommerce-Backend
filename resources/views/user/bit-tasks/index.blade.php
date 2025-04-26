@extends('front.layouts.app')

@section('title', 'Bit Tasks')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4 space-y-8">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Bit Tasks</h1>
                        <p class="text-white/80 mt-1">Complete tasks to earn bits which you can use for discounts!</p>
                    </div>
                    <div class="text-center bg-white/20 rounded-lg p-3">
                        <p class="text-sm text-white/80">Your Balance</p>
                        <p class="text-xl font-bold text-white">{{ auth()->user()->bit_balance }} Bits</p>
                    </div>
                </div>
            </div>

            <!-- Task List -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($tasks as $task)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                        <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                            <h2 class="font-semibold text-lg text-gray-800 dark:text-white">{{ $task->title }}</h2>
                            <div class="flex items-center mt-2">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                                    {{ $task->bit_value }} Bits
                                </span>
                                
                                @if(in_array($task->id, $completedTasks))
                                    <span class="ml-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Completed
                                    </span>
                                @endif
                                
                                @if($task->max_submissions && $task->approved_submissions_count >= $task->max_submissions)
                                    <span class="ml-2 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        Max Reached
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($task->description, 120) }}</p>
                            
                            <div class="flex justify-between items-center">
                                @if(in_array($task->id, $completedTasks))
                                    <span class="text-green-600 dark:text-green-400 text-sm font-medium">
                                        <i class="fas fa-check-circle mr-1"></i> Submitted
                                    </span>
                                @else
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $task->total_submissions }} submissions
                                    </span>
                                @endif
                                
                                <a href="{{ route('user.bit-tasks.show', $task) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition-colors">
                                    View Task
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-8 text-center">
                        <div class="flex flex-col items-center">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-full mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">No Tasks Available</h3>
                            <p class="mt-1 text-gray-500 dark:text-gray-400">Check back soon for new opportunities to earn bits!</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
