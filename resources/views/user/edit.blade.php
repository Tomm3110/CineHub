<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon Profil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">

<main class="flex-grow flex flex-col items-center justify-center px-6 py-12">

    <h1 class="text-4xl font-bold mb-8 text-center">Modifier mon Profil</h1>

    <!-- Messages de session -->
    @if(session('success'))
        <div class="mb-6 w-full max-w-2xl bg-green-900/30 border border-green-700 text-green-200 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Affichage des erreurs de validation -->
    @if($errors->any())
        <div class="mb-6 w-full max-w-2xl bg-red-900/40 border border-red-700 text-red-200 px-4 py-3 rounded-lg">
            <p class="font-bold mb-2">Correction requise :</p>
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-2xl shadow-2xl p-8 w-full max-w-2xl">

        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Champ Prenom (Correction: name="firstname") -->
            <div>
                <label for="firstname" class="block mb-2 text-gray-300 font-semibold">Prénom :</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $user->firstname) }}"
                       class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white focus:ring-2 focus:ring-red-500" required>
                @error('firstname')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Nom (Correction: name="lastname") -->
            <div>
                <label for="lastname" class="block mb-2 text-gray-300 font-semibold">Nom :</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}"
                       class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white focus:ring-2 focus:ring-red-500" required>
                @error('lastname')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Email -->
            <div>
                <label for="email" class="block mb-2 text-gray-300 font-semibold">Adresse Email :</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white focus:ring-2 focus:ring-red-500" required>
                @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons d'action -->
            <div class="flex gap-4 pt-4 justify-center">
                <button type="submit" class="bg-red-700 hover:bg-red-600 px-8 py-3 rounded-full font-semibold shadow-xl transition transform hover:scale-105">
                    Enregistrer les modifications
                </button>
                <a href="{{ route('user.show') }}" class="px-8 py-3 border border-red-600 rounded-full hover:bg-red-900/40 transition duration-200">
                    Annuler
                </a>
            </div>
        </form>

    </div>
</main>

</body>
</html>
