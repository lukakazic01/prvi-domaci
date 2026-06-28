<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('/resources/css/app.css')
</head>
<title>{{ $title ?? 'App' }}</title>
<body>
    <x-navigation />
        <div class="p-4 pb-30">
            {{ $slot }}
        </div>
    <x-footer />
</body>
</html>
