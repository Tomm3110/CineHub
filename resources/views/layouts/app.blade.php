<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Mon Application CinéHub')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">
        <x-header></x-header>
        <div class="container mx-auto p-6">
            @yield('content')
        </div>
        <x-footer></x-footer>
    </body>
</html>
