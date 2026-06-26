<x-layout>
    <div class="flex justify-center">
        <div class="max-w-150 w-full flex flex-col gap-6">
            @forelse($contacts as $contact)
                <div class="flex flex-col gap-4 border border-gray-200 rounded-md shadow-md">
                    <p class="p-2 bg-gray-200 text-gray-700 font-bold text-xl">{{ $contact->email }}</p>
                    <p class="px-2">
                        <span class="font-medium text-gray-500">Subject:</span>
                        {{ $contact->subject }}
                    </p>
                    <p class="px-2">
                        <span class="font-medium text-gray-500">Message:</span>
                        {{ $contact->message }}
                    </p>
                </div>
                @empty
                <x-base.notification>
                    Sorry, there are no contacts in database, feel free to add one 😀
                </x-base.notification>
            @endforelse
        </div>
    </div>
</x-layout>
