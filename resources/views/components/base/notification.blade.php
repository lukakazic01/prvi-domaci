@props(['type' => 'info'])

<div {{ $attributes->class([
    'py-2 px-4 text-sm rounded-md',
    'bg-blue-100 text-blue-700 border border-blue-500'   => $type == 'info',
    'bg-yellow-100 text-yellow-700 border border-yellow-500' => $type == 'warning',
    'bg-green-100 text-green-700 border border-green-500'  => $type == 'success',
    'bg-red-100 text-red-700 border border-red-500'      => $type == 'error'])
    }}>
    {{ $slot }}
</div>
