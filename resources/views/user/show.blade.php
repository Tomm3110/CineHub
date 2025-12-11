<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Profil | CinéHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col">
<x-header></x-header>

<main class="flex-grow flex flex-col items-center justify-center px-6 py-12">

    @if (session('success'))
        <div class="mb-6 w-full max-w-2xl bg-green-900/30 border border-green-700 text-green-200 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-2xl shadow-2xl p-8 w-full max-w-2xl">

        <!-- Avatar et informations principales -->
        <div class="flex flex-col items-center text-center mb-8">

            <!-- Avatar par défaut -->
            <div class="mb-6">
                <div class="w-32 h-32 rounded-full border-4 border-red-900/50 bg-gradient-to-br from-red-900 to-red-950 flex items-center justify-center">
                    <svg class="w-16 h-16 text-red-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <!-- Informations utilisateur -->
            <div class="space-y-4 w-full">
                <a href={{ route('user.edit') }} <bouton> Modifier </bouton> </a>

                <!-- Nom -->
                <div class="bg-red-950/30 rounded-xl p-6 border border-red-900/30">
                    <p class="text-gray-400 text-sm mb-2">Nom</p>
                    <p class="text-2xl font-bold text-white">{{ $user->lastname }}</p>
                </div>

                <!-- Email -->
                <div class="bg-red-950/30 rounded-xl p-6 border border-red-900/30">
                    <p class="text-gray-400 text-sm mb-2">Email</p>
                    <p class="text-xl text-white">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
