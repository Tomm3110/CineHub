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
        <div class="container mx-auto p-6 mt-10">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-600/50 text-green-200 rounded">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-800/40 text-red-200 rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
        <x-footer></x-footer>
    </body>
</html>
