@extends('front.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('user.tickets.index') }}" class="btn btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Tickets
            </a>
            <h1 class="text-2xl font-bold">{{ $ticket->subject }}</h1>
        </div>
        <span @class([
            'px-3 py-1 rounded-full text-sm',
            'bg-green-500/10 text-green-400' => $ticket->status === 'open',
            'bg-yellow-500/10 text-yellow-400' => $ticket->status === 'pending',
            'bg-red-500/10 text-red-400' => $ticket->status === 'closed',
        ])>
            {{ ucfirst($ticket->status) }}
        </span>
    </div>

    <!-- Main Chat Container -->
    <div class="card-glow rounded-xl overflow-hidden">
        <!-- Chat Header -->
        <div class="p-4 bg-purple-500/5 border-b border-purple-500/20">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-400">Ticket #{{ $ticket->id }}</div>
                    <div class="text-sm text-gray-400">Created {{ $ticket->created_at->format('M d, Y') }}</div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-400">{{ $replies->count() }} replies</div>
                </div>
            </div>
        </div>

        <!-- Messages Area with Fixed Height and Scrolling -->
        <div class="h-[600px] flex flex-col">
            <div class="flex-1 overflow-y-auto p-6 space-y-6" id="messageContainer">
                <!-- Original Ticket Message -->
                <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img src="{{ $ticket->user && $ticket->user->photo ? 
                                Helpers::image($ticket->user->photo, 'user/avatar/','user.png') : 
                                asset('assets/images/users/user.png') }}" 
                                alt="User" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <div class="font-medium">{{ $ticket->user->name }}</div>
                            <div class="text-sm text-gray-400">{{ $ticket->created_at->format('M d, Y g:i A') }}</div>
                        </div>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        {{ $ticket->description }}
                    </div>
                </div>

                <!-- Reply Messages -->
                @foreach($replies as $reply)
                    <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20 
                              @if($reply->sender_type === 'admin') bg-opacity-20 @endif">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 rounded-full overflow-hidden">
                                @if($reply->sender_type === 'admin')
                                    <div class="w-full h-full bg-purple-500 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                        </svg>
                                    </div>
                                @else
                                    <img src="{{ $reply->sender && $reply->sender->photo ? 
                                        Helpers::image($reply->sender->photo, 'user/avatar/','user.png') : 
                                        asset('assets/images/users/user.png') }}" 
                                        alt="User" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <div class="font-medium flex items-center">
                                    {{ $reply->sender_type === 'admin' ? 'Support Team' : 'You' }}
                                    @if($reply->sender_type === 'admin')
                                        <span class="ml-2 px-2 py-0.5 bg-purple-500/20 rounded-full text-xs text-purple-400">Staff</span>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-400">{{ $reply->created_at->format('M d, Y g:i A') }}</div>
                            </div>
                        </div>
                        <div class="prose prose-invert max-w-none">
                            {!! nl2br(e($reply->message)) !!}
                        </div>
                        
                        @if($reply->attachments)
                            <div class="mt-4 space-y-2">
                                @foreach(json_decode($reply->attachments, true) as $key=>$attachment)
                                    <div class="flex items-center p-2 rounded bg-purple-500/10">
                                        <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                        </svg>
                                        <span class="text-sm truncate flex-1">Attachment {{ $key+1 }}</span>
                                        <a href="{!! Helpers::image($attachment, 'tickets/') !!}" 
                                           download
                                           class="ml-2 text-purple-400 hover:text-purple-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Reply Form -->
            @if($ticket->status !== 'closed')
                <div class="border-t border-purple-500/20 p-4 bg-purple-500/5">
                    <form action="{{ route('user.tickets.reply', $ticket->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data"
                          class="space-y-4">
                        @csrf
                        <textarea name="message" 
                                  rows="3" 
                                  class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none resize-none"
                                  placeholder="Type your reply..."
                                  required></textarea>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <input type="file" id="file-upload" name="attachments[]" multiple class="hidden">
                                <label for="file-upload" class="btn btn-secondary">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                    </svg>
                                    Attach Files
                                </label>
                                <div id="file-list" class="text-sm text-gray-400"></div>
                            </div>
                            <p class="mt-1 text-xs text-gray-400">
                                Supported formats: JPG, PNG, PDF, DOC. Max size: 2MB
                            </p>
                            <button type="submit" class="btn btn-primary">Send Reply</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="border-t border-purple-500/20 p-4 bg-purple-500/5 text-center text-gray-400">
                    This ticket is closed. Please create a new ticket if you need further assistance.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // File upload preview
    document.getElementById('file-upload').addEventListener('change', function(e) {
        const fileList = document.getElementById('file-list');
        fileList.innerHTML = '';
        
        Array.from(this.files).forEach(file => {
            const fileSize = (file.size / 1024).toFixed(1);
            const div = document.createElement('div');
            div.className = 'flex items-center p-2 rounded bg-purple-500/5 border border-purple-500/20';
            div.innerHTML = `
                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-sm truncate max-w-[150px]">${file.name}</span>
                <span class="text-xs text-gray-400 ml-2">${fileSize}KB</span>
            `;
            fileList.appendChild(div);
        });
    });
</script>
@endsection
