<x-layout>
    <x-slot:title>Login page</x-slot:title>
    <div class="container mx-auto">
        <form action="{{ route('login.store') }}" method="POST" class="w-full border mt-2 border-gray-200 rounded flex flex-col gap-4 p-4">
            @csrf
            <x-forms.field required name="email" class="flex flex-col gap-2">
                <x-forms.label>Email</x-forms.label>
                <x-forms.input type="email" :value="old('email')" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="password" class="flex flex-col gap-2">
                <x-forms.label>Password</x-forms.label>
                <x-forms.input type="password" :value="old('password')" />
                <x-forms.error-message />
            </x-forms.field>
            <div class="grow items-end w-full flex">
                <x-base.button type="submit">Submit</x-base.button>
            </div>
        </form>
    </div>
</x-layout>
