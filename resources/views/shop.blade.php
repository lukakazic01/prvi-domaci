<x-layout>
    <x-slot:title>Shop</x-slot:title>
    <div class="flex justify-center items-center mt-30">
        <div class="max-w-150 rounded border border-gray-200 p-4">
            <div class="flex justify-between text-gray-600 font-bold mb-4">
                <p>Name</p>
                <p>Price</p>
            </div>
            @forelse($items as $item)
                <div class="flex items-center justify-between gap-4">
                    <p class="text-gray-500">{{ $item["name"] }}</p>
                    <p class="font-bold text-gray-700">{{ $item["price"] }}$</p>
                </div>
                @empty
                <p>Currently, we dont have any products in stock :(</p>
            @endforelse
        </div>
  </div>
</x-layout>
