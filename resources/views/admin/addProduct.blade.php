<x-layout>
    <x-slot:title>Add product</x-slot:title>
    <div class="container mx-auto">
        <p class="text-center font-bold text-2xl text-gray-600 mb-10 tracking-tight">
            Ready to sell something? Insert your new product 😃
        </p>
        <form enctype="multipart/form-data" method="POST" action="/admin/store-product" class="flex flex-col gap-4">
            @csrf
            <x-forms.field required name="name">
                <x-forms.label>Name of product</x-forms.label>
                <x-forms.input />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="description">
                <x-forms.label>Description</x-forms.label>
                <x-forms.textarea />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="price">
                <x-forms.label>Price ($):</x-forms.label>
                <x-forms.input type="number" step=".01" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="amount">
                <x-forms.label>Amount</x-forms.label>
                <x-forms.input type="number" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="image">
                <x-forms.label>Upload image of a product</x-forms.label>
                <x-forms.file-upload />
                <x-forms.error-message />
            </x-forms.field>
            <x-base.button type="submit">
                Submit
            </x-base.button>
        </form>
    </div>
</x-layout>
