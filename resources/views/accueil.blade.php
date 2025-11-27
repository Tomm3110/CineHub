@extends('layouts.app')
@section('title', 'accueil')
@section('content')
<!-- Page d'accueil pour un utilisateur connecté-->
<main class="flex-grow px-8 pt-40 pb-20">
    <!-- Section Films -->
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6 border-l-4 border-red-600 pl-3">🎬 Films à l’affiche</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ([
                ['titre' => 'Film 1', 'genre' => 'Action', 'image' => 'https://picsum.photos/300/400?random=1'],
                ['titre' => 'Film 2', 'genre' => 'Comédie', 'image' => 'https://picsum.photos/300/400?random=2'],
                ['titre' => 'Film 3', 'genre' => 'Drame', 'image' => 'https://picsum.photos/300/400?random=3'],
                ['titre' => 'Film 4', 'genre' => 'Science-fiction', 'image' => 'https://picsum.photos/300/400?random=4']
            ] as $film)
                <div class="bg-white/10 rounded-xl overflow-hidden shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ $film['image'] }}" alt="{{ $film['titre'] }}" class="w-full h-80 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $film['titre'] }}</h3>
                        <p class="text-sm text-gray-300 mb-3">{{ $film['genre'] }}</p>
                        <a href="#" class="inline-block bg-red-700/70 hover:bg-red-700 transition-colors px-4 py-2 rounded-full text-sm font-medium">
                            Voir plus
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Section Séries -->
    <section>
        <h2 class="text-3xl font-bold mb-6 border-l-4 border-red-600 pl-3">📺 Séries populaires</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ([
                ['titre' => 'Série 1', 'genre' => 'Thriller', 'image' => 'https://picsum.photos/300/400?random=5'],
                ['titre' => 'Série 2', 'genre' => 'Fantastique', 'image' => 'https://picsum.photos/300/400?random=6'],
                ['titre' => 'Série 3', 'genre' => 'Humour', 'image' => 'https://picsum.photos/300/400?random=7'],
                ['titre' => 'Série 4', 'genre' => 'Policier', 'image' => 'https://picsum.photos/300/400?random=8']
            ] as $serie)
                <div class="bg-white/10 rounded-xl overflow-hidden shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ $serie['image'] }}" alt="{{ $serie['titre'] }}" class="w-full h-80 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $serie['titre'] }}</h3>
                        <p class="text-sm text-gray-300 mb-3">{{ $serie['genre'] }}</p>
                        <a href="#" class="inline-block bg-red-700/70 hover:bg-red-700 transition-colors px-4 py-2 rounded-full text-sm font-medium">
                            Voir plus
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
