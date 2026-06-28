<x-layout>
    <x-slot:title>Main page</x-slot:title>
    <div class="container mx-auto">
        @forelse($lastSixProducts as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="px-6 py-10 text-center text-gray-400">
                <p class="text-lg">😔 No products in stock right now.</p>
            </div>
        @endforelse
    </div>
</x-layout>
