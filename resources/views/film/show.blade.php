@extends('layouts.app')
@section('title', 'Detail du film')

@section('content')
    <div class="mt-16 mb-10 text-white">

        {{-- Retour --}}
        <a href="{{ route('film.index') }}"
           class="inline-block mt-10 text-red-300 hover:text-red-100 transition mb-5">
            ⬅ Retour à la liste
        </a>
        <h1 class="text-4xl font-bold mb-8">{{ $film->titre }}</h1>
        <div class="bg-red-900/40 border border-red-700 rounded-xl p-6 flex flex-col md:flex-row gap-6">

            {{-- Image du film --}}
            <div class="flex-shrink-0">
                <img src="{{ $film->media }}" class="h-64 w-48 object-cover rounded-lg shadow-lg border border-red-800">
            </div>

            {{-- Informations --}}
            <div class="space-y-4 flex-1">
                <p class="text-lg"><span class="font-semibold text-red-300">Date de sortie :</span> {{ $film->annee->locale('fr')->translatedFormat('j F Y') }}</p>
                <p class="text-lg"><span class="font-semibold text-red-300">Réalisateur :</span> {{ $film->realisateur }}</p>
                <p class="text-lg leading-relaxed"><span class="font-semibold text-red-300">Synopsis :</span> <br>{{ $film->synopsis }}</p>
            </div>
        </div>

        {{-- Boutons modifier et supprimer --}}
        <div class="flex items-center gap-6 mt-6">
            <a href="{{ route('film.edit', $film->id) }}" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-500 text-black font-semibold rounded-full transition">Modifier</a>
            <form action="{{ route('film.destroy', $film->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-600 rounded-full font-semibold transition">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
