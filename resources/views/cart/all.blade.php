<x-layout>
    <x-slot:title>Shopping Cart</x-slot:title>
    <div class="container mx-auto">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <x-base.notification class="w-full">
                Currently, you dont have any item in the card.
            </x-base.notification>
        @endforelse
    </div>
</x-layout>
