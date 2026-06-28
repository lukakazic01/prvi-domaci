@aware(['required' => false, 'name'])

<label for="{{ $name }}">
    {{ $slot }} @if($required) <span class="text-red-500">*</span> @endif
</label>
