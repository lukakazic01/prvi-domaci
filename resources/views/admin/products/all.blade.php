<x-layout>
    <div class="container mx-auto">
        <div class="w-full overflow-x-auto rounded-xl border border-gray-200">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 font-medium">
                <tr>
                    <th class="px-2 py-3 text-left" colspan="1">ID</th>
                    <th class="px-2 py-3 text-left" colspan="1">Image</th>
                    <th class="px-2 py-3 text-left" colspan="1">Name</th>
                    <th class="px-2 py-3 text-left hidden md:table-cell" colspan="1">Description</th>
                    <th class="px-2 py-3 text-left" colspan="1">Price</th>
                    <th class="px-2 py-3 text-left" colspan="1">Amount</th>
                    <th class="px-2 py-3 text-left hidden md:table-cell" colspan="1">Created at</th>
                    <th class="px-2 py-3" colspan="1">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-2 py-3 text-gray-400">#{{ $product->id }}</td>
                        <td class="px-2 py-3 text-gray-400">
                            @if (!empty($product->image))
                                <img src="{{ asset('storage/' . $product->image) }}" alt="product" class="object-cover aspect-square" width="100" height="100" />
                            @else
                                <img src="https://placehold.co/100x100?font=poppins" alt="placeholder image" />
                            @endif
                        </td>
                        <td class="px-2 py-3">{{ $product->name }}</td>
                        <td class="px-2 py-3 text-gray-500 hidden md:table-cell truncate max-w-50">{{ $product->description }}</td>
                        <td class="px-2 py-3 font-medium text-blue-600">${{ $product->price }}</td>
                        <td class="px-2 py-3">{{ $product->amount }}</td>
                        <td class="px-2 py-3 text-gray-400 hidden md:table-cell">{{ !empty($product->created_at) ? $product->created_at->format('d/m/Y') : '' }}</td>
                        <td class="px-2 py-3">
                            <div class="flex md:flex-row flex-col gap-2 items-center justify-center">
                                <x-link href="{{ route('admin.products.edit', $product->id) }}" class="px-0! py-0! w-full text-center bg-yellow-200 border border-yellow-400 text-gray-900!">
                                    Edit
                                </x-link>
                                <form class="w-full" action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-base.button type="submit" class="px-0! py-0! bg-red-200 border border-red-400 text-gray-900!">
                                        Delete
                                    </x-base.button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-2 py-3">
                            <x-base.notification class="text-center">
                                Sorry, but there are no products to show,
                                <x-link href="{{ route('admin.products.add') }}" class="text-blue-500 underline">add one</x-link> 😃
                            </x-base.notification>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
