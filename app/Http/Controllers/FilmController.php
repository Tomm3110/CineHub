<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Cookie;

class FilmController extends Controller
{
    public function index(Request $request) {
        $cat = $request->input('cat');
        if ($cat === null) {
            $cat = $request->cookie('cat');
        }
        if (!$cat) {
            $cat = 'All';
        }
        Cookie::queue('cat', $cat, 10);
        $query = Film::query();
        if ($cat != 'All' && $cat != '') {
            $query->where('titre', $cat);
        }
        $films = $query->get();
        $titres = Film::distinct()->pluck('titre');

        $medias = Film::distinct()->pluck('media');

        return view('film.index', [
            'titre' => "Liste des films",
            'cat' => $cat,
            'titres' => $titres,
            'films' => $films,
            'medias' => $medias
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
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee' => 'nullable|integer',
            'realisateur' => 'nullable|string|max:255',
            'synopsis' => 'nullable|string',
            'media' => 'nullable|string',
        ]);

        // 2. Création
        $film = new Film();
        $film->titre = $request->input('titre');
        $film->annee = $request->input('annee');
        $film->realisateur = $request->input('realisateur');
        $film->synopsis = $request->input('synopsis');
        $film->media = $request->input('media');
        $film->save();

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
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        $film = Film::findOrFail($id);
        $film->titre = $request->input('titre');
        $film->annee = $request->input('annee');
        $film->realisateur = $request->input('realisateur');
        $film->synopsis = $request->input('synopsis');
        $film->media = $request->input('media');
        $film->save();

        return redirect()->route('film.index')->with('success', 'Film mis à jour');
    }
}
