<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id)
    {
        Auth::user()->seen()->attach($id);
       //  echo "Episode vu ".$id.PHP_EOL;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seenEpisode($id)
    {
        Auth::user()->seen()->attach($id);
        $idSerie=Episode::find($id)->serie_id;
        return redirect('/series/'.$idSerie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $episode= Episode::find($id);
        $num = $episode->numero;
        $num2 = $num -1;
        $num++;
        $nextE = Episode::where([['serie_id', $episode->serie_id],['saison', $episode->saison],['numero', $num]]) -> first();
        if($num2 > 0) {
            $predE = Episode::where([['serie_id', $episode->serie_id], ['saison', $episode->saison], ['numero', $num2]])->first();
            $pred = $predE->id;
        }
        else {
            $pred = null;
        }
        if(isset($nextE)){
            $next = $nextE->id;
        }
        else {
            // voir si saison suivante
            // saison++
            $next = null;
        }
        return view('episodes.show', ['episodes' => $episode, 'next' => $next, 'pred' => $pred]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
