<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Cookie;

class FilmController extends Controller
{
    public function index(Request $request) {
        $cat = $request->input('cat');

        if (!$cat) {
            $cat = 'All';
        }

        $query = Film::query();
        if ($cat != 'All' && $cat != '') {
            $query->where('titre', 'like', '%' . $cat . '%');
        }
        $films = $query->with('medias')->get();
        $titres = Film::distinct()->pluck('titre');

        return view('film.index', [
            'titre' => "Liste des films",
            'cat' => $cat,
            'titres' => $titres,
            'films' => $films,
        ]);
    }

    public function show($id) {
        $film = Film::findOrFail($id);
        return view('film.show', compact('film'));
    }

    public function create() {
        return view('film.create');
    }

    public function store(Request $request) {
        // 1. Validation
        $validated=$request->validate([
            'titre' => 'required|string|max:255',
            'date_sortie' => 'nullable|date',
            'synopsis' => 'nullable|string',
            'poster_url' => 'nullable|url',
        ]);

        // 2. Création
        $film = new Film();
        $film->titre = $request->input('titre');
        $film->date_sortie = $request->input('date_sortie');
        $film->synopsis = $request->input('synopsis');
        $film->save();

        if (!empty($validated['poster_url'])) {
            $film->medias()->create([
                'type' => 'poster',
                'url' => $validated['poster_url'],
                'description' => 'Affiche de ' . $film->titre
            ]);
        }

        // 3. Redirection avec message flash
        return redirect()->route('film.index')
            ->with('success', 'Film créé avec succès');
    }

    public function edit($id) {
        $film = Film::findOrFail($id);
        return view('film.edit', compact('film'));
}

    public function destroy($id) {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film supprimé');
    }


    public function update(Request $request, $id) {
        // Validation
        $validated=$request->validate([
            'titre' => 'required|string|max:255',
            'date_sortie' => 'nullable|date',
            'synopsis' => 'nullable|string',
            'poster_url' => 'nullable|url',
        ]);

        $film = Film::findOrFail($id);
        $film->titre = $request->input('titre');
        $film->date_sortie = $request->input('date_sortie');
        $film->synopsis = $request->input('synopsis');
        $film->save();

        if (!empty($validated['poster_url'])) {
            $film->medias()->updateOrCreate(
                ['type' => 'poster'],
                [
                    'url' => $validated['poster_url'],
                    'description' => 'Affiche de ' . $film->titre]
            );
        }

        return redirect()->route('film.index')->with('success', 'Film mis à jour');
    }
}
