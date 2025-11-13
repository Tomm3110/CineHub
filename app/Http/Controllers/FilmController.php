<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index() {
        $cat = request()->input('cat', "All");
        $query = Film::query();
        if ($cat != 'All') {
            $query->where('titre', $cat);
        }
        $films = $query->get();
        $query = Film::query();
        $cats = $query->distinct()->pluck('titre');
        return view('films.index', ['titre'=>"Liste des films",'cat'=>$cat,'titres' => $cats ,'films' => $films]);
    }
}
