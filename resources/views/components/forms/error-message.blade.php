@aware([
    'name', 'errorKey'
])

@if($errors->has($errorKey ?: $name))
    <p class="text-xs text-red-500">{{$errors->first($errorKey ?: $name)}}</p>
@endif
