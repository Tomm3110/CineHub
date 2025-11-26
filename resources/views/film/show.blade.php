<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du film</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">

    <h1 class="text-4xl font-bold mb-6">Détails du film</h1>

    <div class="p-6 bg-red-900/20 border border-red-700 rounded-xl space-y-3">
        <p><img src="{{ $film->media }}" class="h-64"/></p>
        <p><b>Titre :</b> {{ $film->titre }}</p>
        <p><b>Année :</b> {{ $film->annee }}</p>
        <p><b>Réalisateur :</b> {{ $film->realisateur }}</p>
        <p><b>Synopsis :</b> {{ $film->synopsis }}</p>
    </div>

    <div class="flex gap-2">
        <a href="{{ route('film.edit', $film->id) }}"
            class="text-yellow-500 hover:text-yellow-400 font-semibold text-sm transition">
            Modifier
        </a>
    </div>

    <form action="{{ route('film.destroy', $film->id) }}" method="POST"
        onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-semibold transition">
            Supprimer
        </button>
    </form>

    <a href="{{ route('film.index') }}" class="block mt-6 text-red-300 hover:text-red-100">
        ⬅ Retour à la liste
    </a>

</body>

</html>
