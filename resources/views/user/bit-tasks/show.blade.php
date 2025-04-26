@extends('front.layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4 space-y-8">
            <!-- Back Link -->
            <div>
                <a href="{{ route('user.bit-tasks.index') }}" class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-purple-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Tasks
                </a>
            </div>

            <!-- Task Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">{{ $task->title }}</h1>
                        <div class="mt-2">
                            <span class="bg-white/20 text-white text-sm font-medium px-3 py-1 rounded-full">
                                {{ $task->bit_value }} Bits Reward
                            </span>
                        </div>
                    </div>
                    <div class="text-center bg-white/20 rounded-lg p-3">
                        <p class="text-sm text-white/80">Your Balance</p>
                        <p class="text-xl font-bold text-white">{{ auth()->user()->bit_balance }} Bits</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Task Details -->
                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Task Description</h2>
                        <div class="prose prose-sm max-w-none dark:prose-invert mb-6">
                            {!! $task->description !!}
                        </div>

                        @if($task->required_proof)
                            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800 dark:text-blue-300">Required Proof</h3>
                                        <div class="mt-2 text-sm text-blue-700 dark:text-blue-200">
                                            <p>{{ $task->required_proof }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($userSubmission)
                            <div class="bg-gray-50 dark:bg-gray-700/30 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Your Submission</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Submitted on {{ $userSubmission->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        @if($userSubmission->status === 'approved') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                        @elseif($userSubmission->status === 'rejected') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                        @else bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                        @endif">
                                        {{ ucfirst($userSubmission->status) }}
                                    </span>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                        {{ $userSubmission->submission_content }}
                                    </div>
                                    
                                    @if($userSubmission->proof)
                                        <div class="mt-4">
                                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Attached Proof:</h4>
                                            <a href="{{ $userSubmission->proof_url }}" target="_blank" 
                                               class="inline-flex items-center px-3 py-1 bg-purple-50 dark:bg-purple-900/20 text-purple-700 dark:text-purple-400 rounded-md text-sm hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                </svg>
                                                View Attachment
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                
                                @if($userSubmission->admin_notes && $userSubmission->status !== 'pending')
                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300">Admin Feedback:</h4>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $userSubmission->admin_notes }}</p>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Submission Form -->
                            @if(!$task->max_submissions || $task->approved_submissions_count < $task->max_submissions)
                                <form action="{{ route('user.bit-tasks.submit', $task) }}" method="POST" enctype="multipart/form-data" class="mt-6">
                                    @csrf
                                    
                                    @if ($errors->any())
                                        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="ml-3">
                                                    <h3 class="text-sm font-medium text-red-800 dark:text-red-300">There were errors with your submission</h3>
                                                    <div class="mt-2 text-sm text-red-700 dark:text-red-200">
                                                        <ul class="list-disc pl-5 space-y-1">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="mb-6">
                                        <label for="submission_content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your Submission</label>
                                        <textarea id="submission_content" name="submission_content" rows="6" required
                                                class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('submission_content') }}</textarea>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Explain how you completed this task and include any relevant details.</p>
                                    </div>
                                    
                                    @if($task->required_proof)
                                        <div class="mb-6">
                                            <label for="proof" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Upload Proof</label>
                                            <div class="flex items-center space-x-2">
                                                <input type="file" id="proof" name="proof" accept="image/*,application/pdf" 
                                                      class="block w-full text-sm text-gray-500 
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-medium
                                                      file:bg-purple-50 file:text-purple-700
                                                      hover:file:bg-purple-100
                                                      dark:file:bg-gray-700 dark:file:text-gray-300
                                                      dark:hover:file:bg-gray-600">
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Accepted formats: JPEG, PNG, PDF. Max size: 2MB.</p>
                                        </div>
                                    @endif
                                    
                                    <div class="flex justify-end">
                                        <button type="submit" 
                                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                            Submit Task
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 mt-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-300">This task has reached its maximum number of submissions</h3>
                                            <div class="mt-2 text-sm text-yellow-700 dark:text-yellow-200">
                                                <p>Unfortunately, this task has already reached its maximum number of allowed submissions.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Task Information</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Reward</h3>
                                <p class="text-lg font-semibold text-purple-600 dark:text-purple-400">{{ $task->bit_value }} Bits</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h3>
                                <p class="text-sm font-medium">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->status ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' }}">
                                        {{ $task->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </p>
                            </div>
                            
                            @if($task->max_submissions)
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Submissions Limit</h3>
                                    <p class="text-sm text-gray-900 dark:text-white">
                                        {{ $task->approved_submissions_count }} / {{ $task->max_submissions }}
                                        <span class="text-xs text-gray-500 dark:text-gray-400">({{ $task->max_submissions - $task->approved_submissions_count }} remaining)</span>
                                    </p>
                                </div>
                            @endif
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Submissions</h3>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $task->total_submissions }}</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">How It Works</h3>
                            <ol class="list-decimal list-inside space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <li>Complete the task as described</li>
                                <li>Submit your work with any required proof</li>
                                <li>Wait for admin review (usually 24-48 hours)</li>
                                <li>Earn bits upon approval</li>
                                <li>Use bits for discounts during checkout</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
