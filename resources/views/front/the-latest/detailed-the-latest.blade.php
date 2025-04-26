@extends('front.layouts.app')

@section('content')
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('{{asset('assets/front/images/homepagebg.jpg')}}');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">The Latest</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">The Latest</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="max-w-5xl mx-auto px-6 py-12">
            <!-- Image Container -->
            <div class="relative w-full h-[400px] md:h-[500px] lg:h-[600px] overflow-hidden rounded-3xl shadow-xl">
                <img src="{{asset('assets/front/images/blog/featured.jpg')}}" alt="Featured Image"
                    class="w-full h-full object-cover">
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
            </div>

            <!-- Content Section -->
            <div class="mt-8 text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">
                    Discover the Latest Trends
                </h2>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mt-8">Innovations in Technology</h3>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                    Stay updated with the newest innovations in technology. From artificial intelligence to blockchain, the tech industry is constantly evolving. Our articles delve deep into the latest advancements, providing you with expert insights and comprehensive analyses. Whether you're a tech enthusiast or a professional in the field, our content is designed to keep you informed and ahead of the curve.
                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mt-8">Trends in Fashion</h3>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                    Explore the latest trends in fashion. From runway shows to street style, we cover it all. Our fashion experts bring you the newest styles and trends from around the world. Stay ahead of the fashion game with our in-depth articles and expert insights. Whether you're looking for inspiration or just want to stay updated, our fashion section has something for everyone.
                </p>

                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mt-8">Global Updates</h3>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                    Get the latest updates from around the world. Our global news section covers everything from politics to entertainment. Stay informed with our comprehensive coverage and expert analysis. Whether you're interested in current events or just want to stay updated, our global news section has you covered. Explore in-depth articles and stay informed with the latest updates from around the world.
                </p>
                </p>
            </div>
        </div>

    </section>
@endsection