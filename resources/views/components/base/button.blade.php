<button
    {{ $attributes
        ->class(['bg-blue-500 w-full text-white px-4 py-2 rounded cursor-pointer'])
        ->merge(['type' => 'button'])
    }}
>
    {{ $slot }}
</button>
