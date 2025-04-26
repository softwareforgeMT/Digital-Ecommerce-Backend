<article class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
    @if($post->photo)
        <div class="w-full h-72">
            <img src="{{ Helpers::image($post->photo, 'blog/') }}" 
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover">
        </div>
    @endif
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-3">
            <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->created_at->format('M d, Y') }}</span>
            <span><i class="far fa-eye mr-1"></i>{{ $post->views }} views</span>
        </div>
        <h2 class="text-xl font-semibold mb-3">
            <a href="{{ route('front.blog.show', $post->slug) }}" 
               class="text-gray-900 dark:text-white hover:text-purple-600 dark:hover:text-purple-400">
                {{ $post->title }}
            </a>
        </h2>
        <div class="text-gray-600 dark:text-gray-400 mb-4 flex-grow">
            {{ Str::limit($post->summary, 120) }}
        </div>
        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('front.blog.show', $post->slug) }}" 
               class="inline-flex items-center text-purple-600 hover:text-purple-700 dark:text-purple-400 dark:hover:text-purple-300">
                Read More <i class="fas fa-arrow-right ml-2"></i>
            </a>
            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-400 rounded-full text-sm">
                {{ $post->category->name }}
            </span>
        </div>
    </div>
</article>