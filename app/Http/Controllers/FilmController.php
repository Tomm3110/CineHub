<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Film;

class FilmController extends Controller
{
    public function index() {
        $cat = request()->input('cat', "All");
        $query = Film::query();
        if ($cat != 'All') {
            $query->where('categorie', $cat);
        }
        $films = $query->get();
        $query = Film::query();
        $cats = $query->distinct()->pluck('categorie');
        return view('films.index', ['titre'=>"Liste des films",'cat'=>$cat,'categories' => $cats ,'films' => $films]);
    }
}
