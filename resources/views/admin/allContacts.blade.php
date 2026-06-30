<x-layout>
    <div class="container mx-auto">
        <div class="w-full overflow-x-auto rounded-xl border border-gray-200">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 font-medium">
                <tr>
                    <th class="px-2 py-3 text-left" colspan="1">ID</th>
                    <th class="px-2 py-3 text-left" colspan="1">Email</th>
                    <th class="px-2 py-3 text-left" colspan="1">Subject</th>
                    <th class="px-2 py-3 text-left hidden md:table-cell" colspan="1">Message</th>
                    <th class="px-2 py-3 text-left" colspan="1">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50">
                        <td class="px-2 py-3 text-gray-400">#{{ $contact->id }}</td>
                        <td class="px-2 py-3">{{ $contact->email }}</td>
                        <td class="px-2 py-3 text-gray-500">{{ $contact->subject }}</td>
                        <td class="px-2 py-3 font-medium text-blue-600 hidden md:table-cell truncate max-w-50">{{ $contact->message }}</td>
                        <td class="px-2 py-3">
                            <div class="flex md:flex-row flex-col gap-2 items-center justify-center">
                                <x-link href="{{ route('admin.editContact', $contact->id) }}" class="px-0! py-0! w-full text-center bg-yellow-200 border border-yellow-400 text-gray-900!">Edit</x-link>
                                <form class="w-full" action="{{ route('deleteContact', $contact->id) }}" method="POST">
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
                        <td colspan="5" class="px-2 py-3">
                            <x-base.notification class="text-center">
                                Sorry, but there are no contacts to show,
                                <x-link :href="route('home')" class="text-blue-500 underline">add one</x-link> 😃
                            </x-base.notification>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
