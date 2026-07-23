<x-layout>
    <x-slot:title>Shopping Cart</x-slot:title>
    <div class="container mx-auto">
        <div class="flex flex-col gap-6">
            @forelse($products as $product)
                <x-cart-item :product="$product" />
            @empty
                <x-base.notification class="w-full text-center">
                    Currently, you dont have any item in the card. <x-link class="text-blue-500 underline" href="{{ route('shop') }}">Go add one</x-link>
                </x-base.notification>
            @endforelse
            @if($products->isNotEmpty())
                <form method="POST" action="{{ route('orders.create') }}">
                    <x-base.button type="submit">Send order</x-base.button>
                </form>
            @endif
        </div>
    </div>
</x-layout>
