@aware(['required' => false, 'name', 'errorKey'])

<input
    name="{{ $name }}"
    id="{{ $name }}"
    type="file"
    required="{{ $required }}"
    {{ $attributes
        ->class([
            'w-full border border-gray-200 rounded px-4 py-2',
            'file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:bg-blue-500 file:text-white hover:file:bg-blue-600 cursor-pointer',
            'border-red-500' => $errors->has($errorKey ?: $name)
        ])
    }}
/>
