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
}
