<div class="bg-stone-800 border border-stone-700 rounded-xl overflow-hidden shadow-lg flex flex-col h-full hover:shadow-red-900/40 transition duration-300">

    <div class="relative h-64 overflow-hidden bg-gray-900">
        <a href="{{ route('film.show', $film->id) }}" class="block w-full h-full">
            <img src="{{ $film->media }}"
                 alt="{{ $film->titre }}"
                 class="w-full h-full object-cover opacity-90 hover:opacity-100 transition duration-500 hover:scale-105">
        </a>
    </div>

    <div class="p-4 flex flex-col flex-grow">

        <h3 class="text-xl font-bold text-white mb-1">{{ $film->titre }}</h3>

        <div class="text-gray-400 text-sm mb-4 space-y-1">
           <p>{{ $film->annee->locale('fr')->translatedFormat('j F Y') }}</p>
            <p>🎬 {{ $film->realisateur }}</p>
        </div>

        <div class="mt-auto flex justify-between items-center pt-4 border-t border-stone-700">

            <div class="flex gap-2">
                <a href="{{ route('film.edit', $film->id) }}" class="text-yellow-500 hover:text-yellow-400 font-semibold text-sm transition">
                    Modifier
                </a>
            </div>

            <form action="{{ route('film.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-semibold transition">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
