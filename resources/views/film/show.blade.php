@extends('layouts.app')

@section('title', $film->titre)

@section('content')
    <div class="max-w-8xl mx-auto mt-12 mb-20 px-4">

        <nav class="mb-6">
            <a href="{{ route('film.index') }}"
               class="inline-flex items-center text-gray-400 hover:text-white transition duration-200 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour aux films
            </a>
        </nav>

        <div class="bg-stone-800 rounded-3xl overflow-hidden shadow-2xl border border-stone-700 flex flex-col md:flex-row min-h-[600px]">
            <div class="md:w-1/3 lg:w-1/4 relative bg-black shrink-0">
                @php
                    $poster = $film->medias->where('type', 'poster')->first();
                @endphp

                @if($poster)
                    <img src="{{ $poster->url }}"
                         alt="{{ $poster->description }}"
                         class="w-full h-full object-cover object-center opacity-90 hover:opacity-100 transition duration-500">
                @else
                    <div class="w-full h-96 md:h-full bg-stone-900 flex flex-col items-center justify-center text-stone-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Pas d'affiche</span>
                    </div>
                @endif
            </div>

            <div class="md:w-2/3 lg:w-3/4 p-8 md:p-10 flex flex-col min-w-0">

                <div class="flex-grow">
                    <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-red-400 mb-3 uppercase tracking-wider">
                        <span>{{ optional($film->date_sortie)->locale('fr')->translatedFormat('d F Y') }}</span>
                        <span class="w-1 h-1 rounded-full bg-stone-500"></span>

                        @if($film->duree)
                            <span>
                                {{ intdiv($film->duree, 60) }}h {{ $film->duree % 60 }}min
                            </span>
                        @endif
                    </div>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight truncate">
                        {{ $film->titre }}
                    </h1>

                    @if($film->genres && $film->genres->count() > 0)
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($film->genres as $genre)
                                <span class="px-3 py-1 bg-stone-700 text-stone-300 rounded-full text-xs font-semibold hover:bg-stone-600 transition cursor-default border border-stone-600">
                                    {{ $genre->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-white font-bold text-lg mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                            Synopsis
                        </h3>
                        <div class=" min-h-[100px] max-h-[100px] overflow-y-auto pr-4 custom-scrollbar">
                            <p class="text-stone-300 leading-relaxed text-lg text-justify">
                                {{ $film->synopsis }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-8 p-4 bg-stone-900/50 rounded-xl border border-stone-700/50 inline-block">
                        <span class="text-stone-400 text-sm block mb-1">Réalisé par</span>
                        <span class="text-white font-medium text-lg">
                            {{ $film->realisateur ?? 'Information non disponible' }}
                        </span>
                    </div>

                    <div class="mb-10">
                        <h3 class="text-white font-bold text-lg mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Casting principal
                        </h3>

                        @if($film->acteurs->count() > 0)
                            <div class="flex overflow-x-auto pb-4 gap-4 snap-x">
                                @foreach($film->acteurs as $acteur)
                                    <div class="snap-start shrink-0 w-48 bg-stone-900/80 border border-stone-700/50 rounded-xl p-5 hover:bg-stone-800 hover:border-yellow-600/50 transition duration-300 group flex flex-col justify-center">
                                        <h4 class="text-white font-bold text-lg leading-tight mb-2 group-hover:text-yellow-500 transition">
                                            {{ $acteur->name }}
                                        </h4>
                                        <div class="w-8 h-1 bg-stone-700 rounded-full mb-2 group-hover:bg-yellow-600/50 transition"></div>
                                        <p class="text-stone-400 text-sm italic">
                                            {{ $acteur->pivot->role ?? 'Rôle inconnu' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-stone-500 italic">Aucune information sur le casting.</p>
                        @endif
                    </div>

                    <style>
                        .overflow-x-auto::-webkit-scrollbar { height: 8px; }
                        .overflow-x-auto::-webkit-scrollbar-track { background: #292524; border-radius: 4px; }
                        .overflow-x-auto::-webkit-scrollbar-thumb { background: #44403c; border-radius: 4px; }
                        .overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #57534e; }
                    </style>
                </div>

                <div class="pt-8 mt-auto border-t border-stone-700 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('film.edit', $film->id) }}" class="flex items-center gap-2 px-6 py-3 bg-yellow-600 hover:bg-yellow-500 text-black font-bold rounded-lg transition transform hover:-translate-y-0.5 shadow-lg shadow-yellow-900/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                        Modifier le film
                    </a>
                    <form action="{{ route('film.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Attention ! Cette action est irréversible. Voulez-vous vraiment supprimer {{ $film->titre }} ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-2 px-6 py-3 bg-transparent border-2 border-red-600 text-red-500 hover:bg-red-600 hover:text-white font-bold rounded-lg transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            Supprimer
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
