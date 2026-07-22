<x-layout>
    <x-slot:title>Shop</x-slot:title>
    <div class="container mx-auto">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="px-6 py-10 text-center text-gray-400">
                <p class="text-lg">😔 No products in stock right now.</p>
            </div>
        @endforelse
    </div>
</x-layout>
