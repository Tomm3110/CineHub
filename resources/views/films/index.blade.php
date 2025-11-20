<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col p-6">
<x-header></x-header>


<form action="{{route('film.index')}}" class="flex gap-3 mb-6">
    <input type="text" name="cat" placeholder="Titre"
           class="p-2 rounded-xl bg-red-900/40 border border-red-700 text-white w-64">
    <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-600 rounded-full font-semibold">
        Chercher
    </button>
</form>

<div class="space-y-4">
    @foreach($films as $film)
        <div class="p-4 bg-red-900/20 border border-red-700 rounded-xl">
            <p><b>Titre :</b> {{$film->titre}}</p>
            <p><b>Année :</b> {{$film->annee}}</p>
            <p><b>Réalisateur :</b> {{$film->realisateur}}</p>
        </div>
    @endforeach
</div>

<a href="{{ route('film.create') }}" class="block mt-8 px-6 py-3 bg-red-700 hover:bg-red-600 rounded-full font-semibold">
    ➕ Ajouter un film
</a>

</body>
</html>
