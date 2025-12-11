@extends('layouts.app')

@section('title', 'Modifier ' . $film->titre)

@section('content')
    <style>
        body { background-color: #1c1917; }
    </style>

    <div class="max-w-4xl mx-auto mt-12 mb-20 px-4">

        <nav class="mb-6">
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center text-stone-400 hover:text-white transition duration-200 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Annuler
            </a>
        </nav>

        <div class="mb-8 border-b border-stone-700 pb-4">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white">
                Modifier <span class="text-yellow-500">{{ $film->titre }}</span>
            </h1>
            <p class="text-stone-400 mt-2">Mettez à jour les informations du film.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-900/30 border border-green-600 text-green-200 rounded-lg flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-900/30 border border-red-600 text-red-200 rounded-lg">
                <p class="font-bold mb-2">Oups ! Il y a des erreurs :</p>
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-stone-800 rounded-3xl p-8 border border-stone-700 shadow-2xl">
            <form action="{{ route('film.update', $film->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="space-y-2">
                        <label for="titre" class="block text-xs font-bold text-stone-400 uppercase tracking-wider">Titre du film</label>
                        <input type="text" name="titre" id="titre"
                               value="{{ old('titre', $film->titre) }}"
                               class="w-full bg-stone-900 border border-stone-700 rounded-lg px-4 py-3 text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition duration-200"
                               required>
                    </div>

                    <div class="space-y-2">
                        <label for="date_sortie" class="block text-xs font-bold text-stone-400 uppercase tracking-wider">Date de sortie</label>
                        <input type="date" name="date_sortie" id="date_sortie"
                               value="{{ old('date_sortie', optional($film->date_sortie)->format('Y-m-d')) }}"
                               class="w-full bg-stone-900 border border-stone-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition duration-200">
                    </div>

                    <div class="space-y-2">
                        <label for="realisateur" class="block text-xs font-bold text-stone-400 uppercase tracking-wider">Réalisateur</label>
                        <input type="text" name="realisateur" id="realisateur"
                               value="{{ old('realisateur', $film->realisateur) }}"
                               class="w-full bg-stone-900 border border-stone-700 rounded-lg px-4 py-3 text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition duration-200"
                               placeholder="Ex: Ridley Scott">
                    </div>

                    <div class="space-y-2">
                        <label for="poster_url" class="block text-xs font-bold text-stone-400 uppercase tracking-wider">URL de l'affiche</label>
                        @php
                            $currentPosterUrl = $film->medias->where('type', 'poster')->first()?->url;
                        @endphp
                        <input type="url" name="poster_url" id="poster_url"
                               value="{{ old('poster_url', $currentPosterUrl) }}"
                               class="w-full bg-stone-900 border border-stone-700 rounded-lg px-4 py-3 text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition duration-200"
                               placeholder="https://...">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="synopsis" class="block text-xs font-bold text-stone-400 uppercase tracking-wider">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" rows="6"
                              class="w-full bg-stone-900 border border-stone-700 rounded-lg px-4 py-3 text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition duration-200 leading-relaxed">{{ old('synopsis', $film->synopsis) }}</textarea>
                </div>

                <div class="pt-6 border-t border-stone-700 flex items-center justify-end gap-4">
                    {{-- MODIFICATION ICI : url()->previous() également pour le bouton Annuler du bas --}}
                    <a href="{{ url()->previous() }}"
                       class="px-6 py-3 rounded-lg text-stone-300 hover:text-white font-medium hover:bg-stone-700 transition duration-200">
                        Annuler
                    </a>
                    <button type="submit"
                            class="px-8 py-3 bg-yellow-600 hover:bg-yellow-500 text-black font-bold rounded-lg shadow-lg shadow-yellow-900/20 transform hover:-translate-y-0.5 transition duration-200">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
