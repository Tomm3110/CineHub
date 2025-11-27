<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Mon Application CinéHub')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-900 font-sans antialiased">
        <x-header></x-header>
        <div class="container mx-auto p-6">
            @yield('content')
        </div>
        <x-footer></x-footer>
    </body>
</html>
