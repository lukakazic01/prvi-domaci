<input
    name="{{ $name }}"
    id="{{ $name }}"
    {{ $attributes
        ->merge(['type' => 'text'])
        ->class([
            'w-full border border-gray-200 outline-none rounded px-4 py-2',
            'focus:border-blue-700 focus:ring-2 transition-colors focus:ring-blue-500/30'
        ])
    }}
/>
