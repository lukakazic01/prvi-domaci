@props([
    'href',
    'active' => false,
    'activeClass' => ''
])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'block rounded transition-colors ' . ($active ? $activeClass : '')
 ])
}}>
    {{ $slot }}
</a>
