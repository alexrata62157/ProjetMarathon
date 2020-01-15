<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Comment;

class MainController extends Controller{
    public function accueil() {
        $series = Serie::all();
        $nouveautes = Serie::orderBy('premiere', 'desc')->take(3)->get();
        return view("accueil", ['series' => $series, 'nouveautes' => $nouveautes]);
    }

    function profil() {
        $comments=Comment::all();
        return view('user', ['comments'=>$comments]);
    }
}
