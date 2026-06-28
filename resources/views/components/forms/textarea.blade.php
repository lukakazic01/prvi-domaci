@aware(['required' => false, 'name', 'errorKey'])

<textarea
    name="{{ $name }}"
    id="{{ $name }}"
    required="{{ $required }}"
    {{ $attributes
        ->class([
            'w-full border border-gray-200 outline-none rounded px-4 py-2 resize-none',
            'focus:border-blue-700 focus:ring-2 transition-colors focus:ring-blue-500/30',
            'border-red-500' => $errors->has($errorKey ?: $name)
        ])
        ->merge(['rows' => 3])
    }}
></textarea>
