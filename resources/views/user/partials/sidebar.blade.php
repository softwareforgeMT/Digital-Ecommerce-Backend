<div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
    <!-- User Profile Summary -->
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                @if(auth()->user()->photo && auth()->user()->photo != 'user.png')
                    <img src="{{ Helpers::image(auth()->user()->photo, 'user/avatar/', 'user.png') }}" 
                         alt="{{ auth()->user()->name }}"
                         class="h-10 w-10 rounded-full object-cover border-2 border-purple-500">
                @else
                    <div class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-600 dark:text-purple-400 font-bold text-lg">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="space-y-1 py-2">
        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.dashboard') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
            <span>Dashboard</span>
        </a>

        <!-- Orders -->
        <a href="{{ route('user.orders.index') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.orders.*') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-shopping-bag w-5 h-5 mr-3"></i>
            <span>My Orders</span>
        </a>

        <!-- Reviews -->
        <a href="{{ route('user.reviews.index') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.reviews.*') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-star w-5 h-5 mr-3"></i>
            <span>My Reviews</span>
        </a>

        <!-- Profile -->
        <a href="{{ route('user.profile') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.profile') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-user w-5 h-5 mr-3"></i>
            <span>Profile</span>
        </a>

        <!-- Account Settings -->
        <a href="{{ route('user.account-settings') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.account-settings') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-cog w-5 h-5 mr-3"></i>
            <span>Account Settings</span>
        </a>

        <!-- Change Password -->
        <a href="{{ route('user.change-password') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.change-password') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-key w-5 h-5 mr-3"></i>
            <span>Change Password</span>
        </a>

        <!-- Support -->
        <a href="{{ route('user.tickets.index') }}"
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.tickets.*') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-headset w-5 h-5 mr-3"></i>
            <span>Support</span>
        </a>

        <!-- Bit Logs Section -->
        <div class="pt-4 pb-2 px-4">
            <p class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 font-semibold">Bits & Rewards</p>
        </div>
        
        <!-- Bit Tasks -->
        <a href="{{ route('user.bit-tasks.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.bit-tasks.index') || request()->routeIs('user.bit-tasks.show') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-tasks w-5 h-5 mr-3"></i>
            <span>Bit Tasks</span>
        </a>
        
        <!-- Submissions History -->
        <a href="{{ route('user.bit-tasks.history') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.bit-tasks.history') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-history w-5 h-5 mr-3"></i>
            <span>My Submissions</span>
        </a>
        
        <!-- Bit Wallet -->
        <a href="{{ route('user.bit-wallet.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium transition-colors duration-150 ease-in-out
                  {{ request()->routeIs('user.bit-wallet.*') ? 
                     'bg-purple-50 text-purple-700 border-l-4 border-purple-500 dark:bg-gray-700/50 dark:text-purple-400' : 
                     'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white' }}">
            <i class="fas fa-wallet w-5 h-5 mr-3"></i>
            <span>Bit Wallet</span>
            <span class="bg-purple-100 text-purple-800 text-xs font-medium ml-auto px-2 py-0.5 rounded-full dark:bg-purple-900/30 dark:text-purple-300">
                {{ auth()->user()->bit_balance }}
            </span>
        </a>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 rounded-md dark:text-red-400 dark:hover:bg-gray-700">
                <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>