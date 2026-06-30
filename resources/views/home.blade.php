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
        <form action="{{ route('sendContact') }}" method="POST" class="w-full border border-gray-200 rounded flex flex-col gap-4 p-4">
            @csrf
            <x-forms.field required name="email" class="flex flex-col gap-2">
                <x-forms.label>Email</x-forms.label>
                <x-forms.input type="email" placeholder="Enter your email..." />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="subject" class="flex flex-col gap-2">
                <x-forms.label>Subject</x-forms.label>
                <x-forms.input placeholder="Enter subject..." />
               <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="message" class="flex flex-col gap-2">
                <x-forms.label>Message</x-forms.label>
                <x-forms.textarea placeholder="Enter a message..." />
                <x-forms.error-message />
            </x-forms.field>
            <div class="grow items-end w-full flex">
                <x-base.button type="submit">Submit</x-base.button>
            </div>
        </form>
    </div>
</x-layout>
