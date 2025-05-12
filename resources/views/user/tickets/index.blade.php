@extends('front.layouts.app')

@section('meta_title', 'Support Tickets')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
            @include('user.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 shadow">
                <h1 class="text-2xl font-bold text-white">Support Tickets</h1>
                <p class="text-white/80 mt-1">Manage your support conversations</p>
            </div>

            <div class="mt-4 flex justify-between items-center">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-medium">{{ $tickets->count() }}</span> ticket(s) found
                </div>
                <a href="{{ route('user.tickets.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 shadow-sm transition-colors">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Ticket
                </a>
            </div>

            <!-- Tickets List -->
            <div class="mt-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                @if($tickets->count() > 0)
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($tickets as $ticket)
                            <a href="{{ route('user.tickets.show', $ticket->ticket_id) }}" 
                               class="flex items-center justify-between p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div @class([
                                        'w-3 h-3 rounded-full flex-shrink-0',
                                        'bg-green-500' => $ticket->status === 'open',
                                        'bg-yellow-500' => $ticket->status === 'pending',
                                        'bg-red-500' => $ticket->status === 'closed',
                                    ])></div>
                                    <div>
                                        <div class="flex items-center">
                                            <h3 class="font-medium text-gray-800 dark:text-white">{{ $ticket->subject }}</h3>
                                            <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($ticket->status === 'open') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                                @elseif($ticket->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                                                @endif">
                                                {{ ucfirst($ticket->status) }}
                                            </span>
                                        </div>
                                        <div class="flex space-x-4 mt-1">
                                            <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $ticket->created_at->diffForHumans() }}
                                            </p>
                                            {{-- <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $ticket->messages->count() }} {{ Str::plural('message', $ticket->messages->count()) }}
                                            </p> --}}
                                        </div>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 mb-4">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-800 dark:text-white mb-2">No Tickets Found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">You haven't created any support tickets yet.</p>
                        <a href="{{ route('user.tickets.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 shadow-sm transition-colors">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Create Your First Ticket
                        </a>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if($tickets->hasPages())
                <div class="mt-6">
                    {{ $tickets->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection