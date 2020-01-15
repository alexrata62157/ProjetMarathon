<?php

namespace App\Http\Controllers;


use App\Genre;

use App\Episode;
use App\User;
use Illuminate\Http\Request;
use App\Serie;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use PDO;

class ListeSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        // RECUPERER LES annees différentes
        $pdo = DB::connection()->getPdo();
        $q = $pdo->prepare('SELECT DISTINCT YEAR(premiere) as annee FROM series ORDER BY YEAR(premiere)');
        $q->execute();
        $premiereAnnees  = $q->fetchAll(\PDO::FETCH_ASSOC);
        $annee = $request->query('annee', 'All');
        $genreId = $request->query('genre', 'All');
        $search = $request->query('search');
        $genres = Genre::all();
        if ($annee != 'All' ) {
            $series = Serie::whereRaw('year(premiere) = ?',[$annee])->get(); // SELECT * FROM series WHERE year(premiere) = $cat
        }else if ($genreId != 'All' ){
            $genre=Genre::find($genreId);
            $series= $genre->series;
        }else if ($search != null){
            $search=Serie::where('nom','LIKE','%'.$search.'%')->get();
            $series= $search;
        }else{
            $series = Serie::all();
        }
        return view('series.index', ['series' => $series, 'annee' => $annee, 'premiereAnnees' => $premiereAnnees, 'genreId'=>$genreId, 'genres'=>$genres, 'search'=>$search]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $serie = Serie::find($id);
        $comments = $serie->comments;
        $genres = $serie->genres;
        $episodes = $serie->episodes;



        $max = 0;

        foreach ($episodes as $ep) {
            if ($ep->saison > $max) {
                $max = $ep->saison;

            }
        }





        return view('series.show', ['serie' => $serie, 'genres' => $genres, 'episodes' => $episodes, 'comments' => $comments,'max'=>$max, 'action' => $action]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);
        return view('series.edit', ['serie' => $serie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serie = Serie::find($id);

        $serie->avis = $request->avis;
        $serie->urlAvis = $request->urlAvis;


        // insertion de l'enregistrement dans la base de données
        $serie->save();

        return redirect('/series');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
