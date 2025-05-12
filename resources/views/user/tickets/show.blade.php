@extends('front.layouts.app')

@section('meta_title', 'Support Ticket Details')

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
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white truncate">{{ $ticket->subject }}</h1>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @if($ticket->status === 'open') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                        @elseif($ticket->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300
                        @else bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                        @endif">
                        <span class="w-2 h-2 rounded-full mr-2
                            @if($ticket->status === 'open') bg-green-500
                            @elseif($ticket->status === 'pending') bg-yellow-500
                            @else bg-red-500
                            @endif"></span>
                        {{ ucfirst($ticket->status) }}
                    </div>
                </div>
                <p class="text-white/80 mt-1">Ticket #{{ $ticket->id }} · Created {{ $ticket->created_at->format('M d, Y') }}</p>
            </div>

            <!-- Action Bar -->
            <div class="mt-4 flex justify-between items-center">
                <a href="{{ route('user.tickets.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Tickets
                </a>
                {{-- <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $replies->count() }} {{ Str::plural('reply', $replies->count()) }}
                </div> --}}
            </div>

            <!-- Main Chat Container -->
            <div class="mt-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <!-- Messages Area with Fixed Height and Scrolling -->
                <div class="h-[600px] flex flex-col">
                    <div class="flex-1 overflow-y-auto p-6 space-y-6" id="messageContainer">
                        <!-- Original Ticket Message -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                            <div class="flex items-start space-x-3 mb-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600">
                                    <img src="{{ $ticket->user && $ticket->user->photo ? 
                                        Helpers::image($ticket->user->photo, 'user/avatar/','user.png') : 
                                        asset('assets/images/users/user.png') }}" 
                                        alt="User" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $ticket->user->name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->created_at->format('M d, Y g:i A') }}</div>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-300 mt-2 whitespace-pre-line">
                                        {{ $ticket->description }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reply Messages -->
                        @foreach($replies as $reply)
                            <div class="rounded-lg p-4 border 
                                @if($reply->sender_type === 'admin') 
                                    bg-indigo-50 dark:bg-indigo-900/20 border-indigo-200 dark:border-indigo-800/50
                                @else 
                                    bg-gray-50 dark:bg-gray-700/50 border-gray-200 dark:border-gray-700
                                @endif">
                                <div class="flex items-start space-x-3 mb-3">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600">
                                        @if($reply->sender_type === 'admin')
                                            <div class="w-full h-full bg-indigo-600 flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        @else
                                            <img src="{{ $reply->sender && $reply->sender->photo ? 
                                                Helpers::image($reply->sender->photo, 'user/avatar/','user.png') : 
                                                asset('assets/images/users/user.png') }}" 
                                                alt="User" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <div class="font-medium text-gray-900 dark:text-white flex items-center">
                                                {{ $reply->sender_type === 'admin' ? 'Support Team' : 'You' }}
                                                @if($reply->sender_type === 'admin')
                                                    <span class="ml-2 px-2 py-0.5 bg-indigo-100 dark:bg-indigo-800/50 text-indigo-700 dark:text-indigo-300 rounded-full text-xs font-medium">Staff</span>
                                                @endif
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $reply->created_at->format('M d, Y g:i A') }}</div>
                                        </div>
                                        <div class="text-gray-600 dark:text-gray-300 mt-2 whitespace-pre-line">
                                            {!! nl2br(e($reply->message)) !!}
                                        </div>
                                        
                                        @if($reply->attachments)
                                            <div class="mt-4 space-y-2">
                                                @foreach(json_decode($reply->attachments, true) as $key=>$attachment)
                                                    <div class="flex items-center p-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                                                        <svg class="w-5 h-5 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="text-sm truncate flex-1 text-gray-700 dark:text-gray-300">Attachment {{ $key+1 }}</span>
                                                        <a href="{!! Helpers::image($attachment, 'tickets/') !!}" 
                                                           download
                                                           class="ml-2 inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Reply Form -->
                    @if($ticket->status !== 'closed')
                        <div class="border-t border-gray-200 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-700/50">
                            <form action="{{ route('user.tickets.reply', $ticket->id) }}" 
                                method="POST" 
                                enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your Reply</label>
                                    <textarea id="message" 
                                            name="message" 
                                            rows="3" 
                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm resize-none"
                                            placeholder="Type your reply here..."
                                            required></textarea>
                                </div>
                                
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center space-x-2">
                                        <input type="file" id="file-upload" name="attachments[]" multiple class="hidden">
                                        <label for="file-upload" class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                            <svg class="w-5 h-5 mr-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                            </svg>
                                            Attach Files
                                        </label>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            JPG, PNG, PDF, DOC (Max: 2MB)
                                        </p>
                                    </div>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 shadow-sm">
                                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                        </svg>
                                        Send Reply
                                    </button>
                                </div>
                                
                                <div id="file-list" class="space-y-2"></div>
                            </form>
                        </div>
                    @else
                        <div class="border-t border-gray-200 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-700/50">
                            <div class="flex items-center justify-center p-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/50 text-red-700 dark:text-red-300">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                This ticket is closed. Please create a new ticket if you need further assistance.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Scroll to bottom of message container on page load
    document.addEventListener('DOMContentLoaded', function() {
        const messageContainer = document.getElementById('messageContainer');
        if (messageContainer) {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }
    });

    // File upload preview
    document.getElementById('file-upload').addEventListener('change', function(e) {
        const fileList = document.getElementById('file-list');
        fileList.innerHTML = '';
        
        if (this.files.length > 0) {
            const filesHeading = document.createElement('h4');
            filesHeading.className = 'text-sm font-medium text-gray-700 dark:text-gray-300 mb-2';
            filesHeading.textContent = 'Selected Files:';
            fileList.appendChild(filesHeading);
        }
        
        Array.from(this.files).forEach(file => {
            const fileSize = (file.size / 1024).toFixed(1);
            const div = document.createElement('div');
            div.className = 'flex items-center p-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700';
            div.innerHTML = `
                <svg class="w-4 h-4 text-gray-400 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm truncate max-w-xs flex-1 text-gray-700 dark:text-gray-300">${file.name}</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 ml-2 flex-shrink-0">${fileSize}KB</span>
            `;
            fileList.appendChild(div);
        });
    });
</script>
@endsection