<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un film</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">

<h1 class="text-4xl font-bold mb-8">Créer un film</h1>

@if ($errors->any())
    <div class="bg-red-800/40 border border-red-600 p-4 rounded-xl mb-6">
        <ul class="space-y-1 text-red-200">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('film.store') }}" method="POST" class="space-y-6">
    @csrf
<div>
        <label class="block mb-1">Titre :</label>
        <input type="text" name="titre"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white" required>
    </div>

    <div>
        <label class="block mb-1">Date :</label>
        <input type="date" name="annee"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white">
    </div>

    <div>
        <label class="block mb-1">Réalisateur :</label>
        <input type="text" name="realisateur"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white">
    </div>

    <div>
        <label class="block mb-1">Synopsis :</label>
        <textarea name="synopsis" rows="5"
                  class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white"></textarea>
    </div>

    <div>
        <label class="block mb-1">Lien affiche :</label>
        <input type="text" name="media" rows="5"
                  class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white" ></input>
    </div>

    <button type="submit" class="bg-red-700 hover:bg-red-600 px-6 py-3 rounded-full font-semibold">
        Créer
    </button>
</form>

<a href="{{ route('film.index') }}" class="block mt-6 text-red-300 hover:text-red-100">
    ⬅ Retour à la liste
</a>

</body>
</html>
