<div class="flex items-center gap-5 p-4 bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
             class="size-24 object-cover rounded-xl shrink-0 bg-slate-50" />
    @else
        <img src="https://placehold.co/200x200?font=poppins" alt="placeholder"
             class="size-24 object-cover rounded-xl shrink-0" />
    @endif

    <div class="flex-1 min-w-0 flex flex-col gap-1.5">
        <x-link :href="route('products.show', $product->id)"
                class="font-semibold text-slate-900 hover:text-blue-600 transition-colors truncate block text-base">
            {{ $product->name }}
        </x-link>

        <p class="text-sm text-slate-500">${{ $product->price }} each</p>

        <span class="inline-flex items-center gap-1 w-fit text-xs font-medium text-slate-600 bg-slate-100 px-2.5 py-1 rounded-full">
            Qty: {{ $product->quantity }}
        </span>
    </div>

    <div class="flex flex-col items-end gap-3 shrink-0">
        <p class="text-lg font-bold text-slate-900">
            ${{ $product->price * $product->quantity }}
        </p>
        <form method="POST" action="{{ route('cart.delete', $product->id) }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <x-base.button type="submit"
                    class="p-1! text-red-400! bg-red-200 hover:bg-red-400 hover:text-red-600! rounded transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </x-base.button>
        </form>
    </div>
</div>
