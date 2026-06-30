<x-layout>
    <x-slot:title>Add product</x-slot:title>
    <div class="container mx-auto">
        <p class="text-center font-bold text-2xl text-gray-600 mb-10 tracking-tight">
            Edit the information about the product here 😃
        </p>
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.updateContact', $contact->id) }}" class="flex flex-col gap-4">
            @method('PATCH')
            @csrf
            <x-forms.field required name="email">
                <x-forms.label>Email</x-forms.label>
                <x-forms.input :value="old('email') ?? $contact->email" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="subject">
                <x-forms.label>Subject</x-forms.label>
                <x-forms.textarea :value="old('subject') ?? $contact->subject" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="message">
                <x-forms.label>Message</x-forms.label>
                <x-forms.textarea :value="old('message') ?? $contact->message" />
                <x-forms.error-message />
            </x-forms.field>
            <x-base.button type="submit">
                Submit
            </x-base.button>
        </form>
    </div>
</x-layout>
