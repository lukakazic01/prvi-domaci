<x-layout>
    <x-slot:title>Shop</x-slot:title>
    <div class="flex justify-center items-center mt-10">
        <div class="w-full max-w-150 rounded-xl border border-gray-200 shadow-sm">
            <div class="bg-gray-50 px-6 py-3 flex justify-between text-xs font-semibold text-gray-400 uppercase tracking-wider rounded-tr-xl rounded-tl-xl">
                <p>Name</p>
                <p>Price</p>
            </div>
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="px-6 py-10 text-center text-gray-400">
                    <p class="text-lg">😔 No products in stock right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
