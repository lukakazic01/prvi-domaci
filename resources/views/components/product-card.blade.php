@props([
    "product"
])

<a href="{{ route('products.show', $product->id) }}"
   class="group px-6 py-4 rounded border-gray-100 hover:bg-gray-100 transition flex items-center gap-5">

    <div class="relative shrink-0 overflow-hidden rounded-xl">
        @if (!empty($product->image))
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="size-16 object-cover transition duration-300 group-hover:scale-110" />
        @else
            <img src="https://placehold.co/100x100?font=poppins" alt="placeholder image"
                 class="size-16 object-cover transition duration-300 group-hover:scale-110" />
        @endif
    </div>

    <div class="flex items-center justify-between flex-1 min-w-0">
        <div class="flex flex-col gap-1.5 min-w-0">
            <div class="flex items-center gap-2">
                <p class="text-gray-900 font-semibold truncate group-hover:text-gray-700 transition">
                    {{ $product->name }}
                </p>
                @if (str_starts_with($product->name, 'iPhone'))
                    <span class="text-xs tracking-wide font-bold text-white bg-linear-to-r from-red-500 to-orange-500 px-2 py-0.5 rounded-full shrink-0">
                        SUPER DISCOUNT 🔥
                    </span>
                @endif
            </div>
            <p class="text-sm text-gray-400 truncate">{{ $product->description }}</p>
        </div>

        <div class="flex items-center gap-4 pl-4 shrink-0">
            <div class="flex flex-col items-end gap-0.5">
                <p class="font-bold text-gray-900">${{ $product->price }}</p>
                <p class="text-xs text-gray-400">{{ $product->amount }} in stock</p>
            </div>

            <svg class="size-4 text-gray-300 -translate-x-1 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </div>
</a>
