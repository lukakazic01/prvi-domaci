<x-layout>
    <x-slot:title>{{ $product->name }}</x-slot:title>
    <div class="max-w-2xl mx-auto bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex gap-8 p-8">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="size-48 object-cover rounded-xl shrink-0" />
        @else
            <img src="https://placehold.co/300x300?font=poppins" alt="placeholder image"
                 class="size-48 object-cover rounded-xl shrink-0" />
        @endif
        <div class="flex flex-col gap-4 min-w-0">
            @if (str_starts_with($product->name, 'iPhone'))
                <span class="text-xs tracking-wide font-bold text-white bg-linear-to-r from-red-500 to-orange-500 px-2 w-fit py-0.5 rounded-full shrink-0">
                    SUPER DISCOUNT 🔥
                </span>
            @endif
            <div class="flex flex-col gap-1">
                <p class="text-2xl text-gray-900 font-bold leading-tight">{{ $product->name }}</p>
                <p class="text-3xl font-extrabold text-gray-900">${{ $product->price }}</p>
            </div>
            <p class="text-gray-500 leading-relaxed">{{ $product->description }}</p>
            <div class="mt-auto pt-4 border-t border-gray-100 text-sm text-gray-500">
                <span class="font-medium text-gray-800">{{ $product->amount }}</span> in stock
            </div>
            <form class="flex items-end gap-4 flex-col" method="POST" action="{{ route("cart.add") }}">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <x-forms.field name="amount" class="w-full">
                    <x-forms.input min="1" type="number" placeholder="Enter amount" />
                    <x-forms.error-message />
                </x-forms.field>
                <x-base.button type="submit">Add to cart</x-base.button>
            </form>
        </div>
    </div>
</x-layout>
