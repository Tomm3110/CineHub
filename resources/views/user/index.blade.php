<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs | CinéHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col">
<x-header></x-header>

<main class="flex-grow flex flex-col items-center justify-start px-6 py-12">

    @if (session('success'))
        <div class="mb-8 w-full max-w-4xl p-4 bg-green-800/50 border-l-4 border-green-400 text-green-100 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full max-w-6xl">
        <h2 class="text-3xl font-bold mb-6 border-b border-red-700 pb-2">
            Liste des Utilisateurs
        </h2>

        <div class="overflow-x-auto bg-gray-900/50 border border-gray-800 rounded-xl shadow-2xl">
            <table class="min-w-full divide-y divide-gray-700">

                <thead class="bg-red-900/50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Prénom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rôle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-800">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-800/70 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-300">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $user->firstname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $user->lastname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($user->is_admin)
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-600 text-white">
                                        Admin
                                    </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-600 text-white">
                                        Membre
                                    </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('users.edit', $user) }}"
                               class="text-blue-400 hover:text-blue-300 mr-3 transition duration-150">
                                Modifier
                            </a>

                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-400 hover:text-red-300 transition duration-150"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>
