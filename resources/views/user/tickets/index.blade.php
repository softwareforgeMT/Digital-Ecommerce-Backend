@extends('front.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">Support Tickets</h1>
            <p class="text-gray-400 mt-2">Manage your support conversations</p>
        </div>
        <a href="{{ route('user.tickets.create') }}" class="btn btn-primary">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Ticket
        </a>
    </div>

    <!-- Tickets List -->
    <div class="card-glow rounded-xl overflow-hidden">
        @if($tickets->count() > 0)
            <div class="divide-y divide-purple-500/20">
                @foreach($tickets as $ticket)
                    <a href="{{ route('user.tickets.show', $ticket->ticket_id) }}" 
                       class="flex items-center justify-between p-6 hover:bg-purple-500/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <div @class([
                                'w-3 h-3 rounded-full',
                                'bg-green-400' => $ticket->status === 'open',
                                'bg-yellow-400' => $ticket->status === 'pending',
                                'bg-red-400' => $ticket->status === 'closed',
                            ])></div>
                            <div>
                                <h3 class="font-medium">{{ $ticket->subject }}</h3>
                                <p class="text-sm text-gray-400">
                                    Created {{ $ticket->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        @else
            <div class="p-8 text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
                <h3 class="text-xl font-medium mb-2">No Tickets Found</h3>
                <p class="text-gray-400 mb-4">You haven't created any support tickets yet.</p>
                <a href="{{ route('user.tickets.create') }}" class="btn btn-primary">Create Your First Ticket</a>
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
@endsection
