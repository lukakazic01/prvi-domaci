@props([
    "product"
])

<a href="{{ route('products.show', $product->id) }}" class="px-6 py-4 border-t last:rounded-bl-xl last:rounded-br-xl border-gray-100 hover:bg-gray-50 transition flex flex-col gap-3">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <p class="text-gray-800 font-medium">{{ $product->name }}</p>
            @if (str_starts_with($product->name, 'iPhone'))
                <span class="text-xs font-semibold text-white bg-red-500 px-2 py-0.5 rounded-full">
                                    SUPER DISCOUNT 🔥
                </span>
            @endif
        </div>
        <p class="font-bold text-gray-900">${{ $product->price }}</p>
    </div>
    <div class="text-sm">
        <p>
            <span class="font-bold text-gray-900">Description:</span>
            {{ $product->description }}
        </p>
        <p>
            <span class="font-bold text-gray-900">Amount:</span>
            {{ $product->amount }}
        </p>
    </div>
</a>
