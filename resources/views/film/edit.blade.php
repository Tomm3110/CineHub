<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un film</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">

<h1 class="text-4xl font-bold mb-8">Modifier un film</h1>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-800/50 text-green-200 rounded">{{ session('success') }}</div>
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

<form action="{{ route('film.update', $film->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Titre :</label>
        <input type="text" name="titre" value="{{ old('titre', $film->titre) }}"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white" required>
    </div>

    <div>
        <label class="block mb-1">Année :</label>
        <input type="date" name="annee" value="{{ old('annee', date_format($film->annee, "Y-m-d")) }}"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white">
    </div>

    <div>
        <label class="block mb-1">Réalisateur :</label>
        <input type="text" name="realisateur" value="{{ old('realisateur', $film->realisateur) }}"
               class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white">
    </div>

    <div>
        <label class="block mb-1">Synopsis :</label>
        <textarea name="synopsis" rows="5"
                  class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white">{{ old('synopsis', $film->synopsis) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Lien affiche :</label>
        <input type="text" name="media" rows="5"
                  class="w-full p-3 rounded-xl bg-red-900/40 border border-red-700 text-white" value="{{ old('synopsis', $film->media) }}"></input>
    </div>

    <div class="flex gap-3 mt-4">
        <button type="submit" class="bg-red-700 hover:bg-red-600 px-6 py-3 rounded-full font-semibold">
            Enregistrer
        </button>
        <a href="{{ route('film.index') }}" class="px-6 py-3 border border-red-600 rounded-full hover:bg-red-900/40">
            Annuler
        </a>
    </div>
</form>

</body>
</html>
