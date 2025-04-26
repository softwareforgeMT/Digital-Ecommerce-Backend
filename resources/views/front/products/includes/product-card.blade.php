 <a href="{{ route('front.products.show', $data->slug) }}"
   class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full">
    <div class="relative w-full h-48 overflow-hidden">
        @if($data->main_image)
            <img src="{{ Helpers::image($data->main_image, 'products/') }}"
                 alt="{{ $data->name }}"
                 class="w-full h-full object-cover">
        @endif
        @if($data->discount_price)
            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm">
                Sale!
            </div>
        @endif
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">{{ $data->name }}</h3>
        <div class="mt-auto pt-4 flex items-center justify-between border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col">
                @if($data->discount_price)
                    <span class="text-red-500 font-bold">${{ number_format($data->discount_price, 2) }}</span>
                    <span class="text-gray-500 line-through text-sm">${{ number_format($data->price, 2) }}</span>
                @else
                    <span class="text-purple-600 dark:text-purple-400 font-bold">${{ number_format($data->price, 2) }}</span>
                @endif
            </div>
            <span class="text-purple-600 dark:text-purple-400">View Details</span>
        </div>
    </div>
</a>