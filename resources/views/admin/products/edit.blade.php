<x-layout>
    <x-slot:title>Add product</x-slot:title>
    <div class="container mx-auto">
        <p class="text-center font-bold text-2xl text-gray-600 mb-10 tracking-tight">
            Edit the information about the product here 😃
        </p>
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.products.update', $product->id) }}" class="flex flex-col gap-4">
            @method('PATCH')
            @csrf
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/' . $product->image) }}" class="transition-transform hover:scale-105 duration-500 scale-100 aspect-square object-cover rounded-md" width="200" height="200" />
            </div>
            <x-forms.field required name="name">
                <x-forms.label>Name of product</x-forms.label>
                <x-forms.input :value="old('name') ?? $product->name" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="description">
                <x-forms.label>Description</x-forms.label>
                <x-forms.textarea :value="old('description') ?? $product->description" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="price">
                <x-forms.label>Price ($):</x-forms.label>
                <x-forms.input type="number" step=".01" :value="old('price') ?? $product->price" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field required name="amount">
                <x-forms.label>Amount</x-forms.label>
                <x-forms.input type="number" :value="old('amount') ?? $product->amount" />
                <x-forms.error-message />
            </x-forms.field>
            <x-forms.field name="image">
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
