<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-background">
        {{ $slot }}

        {{-- Toast notification container --}}
        <x-strata::toast-container position="top-end" />

    @livewireScripts
    @strataScripts
    </body>
</html>
