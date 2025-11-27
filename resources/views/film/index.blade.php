@extends('layouts.app')
@section('title', 'Detail du film')

@section('content')
    <div class="flex items-center justify-between mt-16 mb-5">
        {{-- Formulaire de recherche --}}
        <form action="{{ route('film.index') }}" class="flex items-center gap-3">
            <input type="text" name="cat" placeholder="Titre"
                   class="p-2 rounded-xl bg-red-900/40 border border-red-700 text-white w-64" value="{{ request('cat') }}"/>
            <button type="submit"
                    class="px-4 py-2 bg-red-700 hover:bg-red-600 rounded-full font-semibold">
                Chercher
            </button>
        </form>
        {{-- Bouton Ajouter --}}
        <a href="{{ route('film.create') }}"
           class="px-6 py-3 bg-red-900/40 border border-red-700 rounded-full font-semibold hover:bg-red-800 transition">
            Ajouter un film
        </a>
    </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($films as $film)
                <x-filmCard :film="$film"></x-filmCard>
            @endforeach
        </div>
        @if($films->isEmpty())
        <div class="text-center text-gray-400 mt-10">
            Aucun film trouvé.
        </div>
        @endif
@endsection
