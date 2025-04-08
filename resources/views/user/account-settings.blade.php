@extends('front.layouts.app')
@section('title')
    @lang('translation.settings')
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">Account Settings</h1>
            <div class="flex items-center text-sm text-gray-400">
                <a href="{{route('user.dashboard')}}" class="hover:text-purple-400">Home</a>
                <span class="mx-2">/</span>
                <span>Settings</span>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="card-glow rounded-xl p-6 text-center">
                    <div class="relative inline-block mb-4">
                        <img id="preview-image" 
                             src="{!! Helpers::image(Auth::user()->photo, 'user/avatar/','user.png') !!}"
                             class="w-32 h-32 rounded-full object-cover border-2 border-purple-400/20"
                             alt="Profile Image">
                        <label for="profile-img-file-input" class="absolute bottom-0 right-0 p-2 rounded-full bg-purple-500/10 border border-purple-400/20 cursor-pointer hover:bg-purple-500/20 transition-colors">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </label>
                    </div>
                    <h3 class="text-xl font-bold mb-1">{{$data->name}}</h3>
                    <p class="text-gray-400 text-sm">{{$data->email}}</p>
                </div>
            </div>

            <!-- Settings Content -->
            <div class="lg:col-span-3">
                <div class="card-glow rounded-xl overflow-hidden">
                    <!-- Tabs -->
                    <div class="flex border-b border-purple-400/20">
                        <button onclick="switchTab('personalDetails')" class="tab-btn flex-1 px-6 py-4 text-center hover:bg-purple-500/10 transition-colors" data-tab="personalDetails">
                            Personal Details
                        </button>
                        <button onclick="switchTab('changePassword')" class="tab-btn flex-1 px-6 py-4 text-center hover:bg-purple-500/10 transition-colors" data-tab="changePassword">
                            Change Password
                        </button>
                    </div>

                    <!-- Personal Details Form -->
                    <div id="personalDetails" class="tab-content p-6">
                        @include('includes.alerts')
                        <form action="{{ route('user.account-settings.update') }}" method="post" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-6">
                            @csrf
                            <input id="profile-img-file-input" type="file" class="hidden" name="photo" accept="image/png, image/gif, image/jpeg">
                            
                            <!-- Name -->
                            <div class="space-y-2">
                                <label class="text-sm text-gray-400">Name</label>
                                <input type="text" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" name="name" value="{{$data->name}}">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-sm text-gray-400">Email</label>
                                <input type="email" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 opacity-75 cursor-not-allowed" value="{{$data->email}}" disabled>
                            </div>

                            <!-- ...existing form fields with new styling... -->
                            <div class="space-y-2">
                                <label class="text-sm text-gray-400">Phone</label>
                                <input type="text" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" name="phone" value="{{$data->phone}}">
                            </div>




                            <div class="space-y-2">
                                <label class="text-sm text-gray-400">Gender</label>
                                <select name="gender" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" required>
                                    <option value="" disabled>Select Gender</option>
                                    <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $data->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                           

                            <div class="md:col-span-2 flex justify-end space-x-4 mt-6">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Form -->
                    <div id="changePassword" class="tab-content hidden p-6">
                        <form action="{{ route('user.reset.submit') }}" method="post" class="space-y-6">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm text-gray-400">Current Password</label>
                                    <input type="password" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" name="cpass" required>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm text-gray-400">New Password</label>
                                    <input type="password" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" name="newpass" required>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm text-gray-400">Confirm Password</label>
                                    <input type="password" class="w-full bg-purple-500/5 border border-purple-400/20 rounded-lg px-4 py-2.5 focus:border-purple-400 focus:outline-none transition-colors" name="renewpass" required>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function switchTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-purple-500/10', 'border-b-2', 'border-purple-400');
        });
        
        // Show selected tab content
        document.getElementById(tabId).classList.remove('hidden');
        
        // Add active class to selected tab
        const activeTab = document.querySelector(`[data-tab="${tabId}"]`);
        activeTab.classList.add('bg-purple-500/10', 'border-b-2', 'border-purple-400');
    }

    // Initialize the first tab as active
    document.addEventListener('DOMContentLoaded', () => {
        switchTab('personalDetails');
        
        // Check for hash in URL
        const hash = window.location.hash.substr(1);
        if (hash) {
            switchTab(hash);
        }
    });

    // Add this new code for image preview
    document.getElementById('profile-img-file-input').onchange = function(e) {
        const file = e.target.files[0];
        if (file) {
            // Check if file is an image
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file');
                return;
            }

            // Check file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Image size should be less than 2MB');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
