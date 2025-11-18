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

        return view('films.index', [
            'titre' => "Liste des films",
            'cat' => $cat,
            'titres' => $titres,
            'films' => $films
        ]);
    }

    public function show($id) {
        $film = Film::findOrFail($id);
        return view('films.show', compact('film'));
    }

    public function create() {
        return view('films.create'); // Affiche le formulaire [cite: 80]
    }

    public function store(Request $request) {
        // 1. Validation
        $request->validate([
            'title' => 'required|string|max:255',
            // Ajoutez ici les autres règles
        ]);

        // 2. Création
        $film = new Film();
        $film->title = $request->input('title');
        $film->media = $request->input('media'); // Le nouveau champ
        // ... autres champs
        $film->save();

        // 3. Redirection avec message flash
        return redirect()->route('films.index')
            ->with('success', 'Film créé avec succès');
    }

    public function edit($id) {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
}

    public function update(Request $request, $id) {
        // Validation (similaire au store)
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $film = Film::findOrFail($id);
        $film->title = $request->input('title');
        // ... mise à jour des autres champs
        $film->save();

        return redirect()->route('films.index')->with('success', 'Film mis à jour');
    }
}
