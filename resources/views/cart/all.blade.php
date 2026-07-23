<x-layout>
    <x-slot:title>Shopping Cart</x-slot:title>
    <div class="container mx-auto">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <x-base.notification class="w-full text-center">
                Currently, you dont have any item in the card. <x-link class="text-blue-500 underline" href="{{ route('shop') }}">Go add one</x-link>
            </x-base.notification>
        @endforelse
    </div>
</x-layout>
