<x-layout>
    <x-slot:title>Shop</x-slot:title>
    <div class="flex justify-center items-center mt-10">
        <div class="w-full max-w-150 rounded-xl border border-gray-200 shadow-sm">
            <div class="bg-gray-50 px-6 py-3 flex justify-between text-xs font-semibold text-gray-400 uppercase tracking-wider rounded-tr-xl rounded-tl-xl">
                <p>Name</p>
                <p>Price</p>
            </div>
            @forelse($products as $product)
                <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100 hover:bg-gray-50 transition">
                    <div class="flex flex-col gap-1">
                        <p class="text-gray-800 font-medium">{{ $product->name }}</p>
                        @if (str_starts_with($product->name, 'Iphone'))
                            <span class="text-xs font-semibold text-white bg-red-500 px-2 py-0.5 rounded-full">
                                SUPER SNIŽENJE 🔥
                            </span>
                        @endif
                    </div>
                    <p class="font-bold text-gray-900">${{ $product->price }}</p>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-gray-400">
                    <p class="text-lg">😔 No products in stock right now.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-layout>
