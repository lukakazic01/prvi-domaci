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
        <div class="p-4">
            <p>Trenutno vreme je: {{ now("Europe/Belgrade")->format("H:i:s") }}
            {{ $slot }}
        </div>
    <x-footer />
</body>
</html>
