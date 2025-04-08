@extends('front.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                Create Support Ticket
            </h1>
            <p class="text-gray-400 mt-2">Submit a new support request</p>
        </div>

        <!-- Ticket Form -->
        <div class="card-glow rounded-xl p-6">
            <form action="{{ route('user.tickets.store') }}" method="POST">
                @csrf
                
                <!-- Subject -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Subject</label>
                    <input type="text" 
                           name="subject" 
                           class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none"
                           required>
                    @error('subject')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Description</label>
                    <textarea name="description" 
                              rows="6" 
                              class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none"
                              required></textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('user.tickets.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
