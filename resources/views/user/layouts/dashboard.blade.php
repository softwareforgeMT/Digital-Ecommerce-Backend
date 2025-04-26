<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.partials.head')
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    @include('front.layouts.partials.header')

    <div class="min-h-screen pt-16">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 shadow">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-6">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">@yield('header', 'Dashboard')</h1>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <div class="lg:w-1/4">
                    @include('user.partials.sidebar')
                </div>

                <!-- Content -->
                <div class="lg:w-3/4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.partials.footer')
    @include('front.layouts.partials.scripts')
    @stack('scripts')
</body>
</html>
