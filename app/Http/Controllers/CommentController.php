<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Comment::all();
        return view('comments.index', ['comments' => $commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'serie_id' => 'required',
                'contenu' => 'required',
                'note' => 'required',
            ]
        );

        $comment = new Comment;

        $comment->user_id = $request->user_id;
        $comment->serie_id = $request->serie_id;
        $comment->content = $request->contenu;
        $comment->note = $request->note;
        $comment->validated = false;

        // insertion de l'enregistrement dans la base de données
        $comment->save();

        return redirect('/series');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $action = $request->query('action', 'show');
        $comments = Comment::find($id);
        return view('comments.show', ['comments' => $comments,'action' => $action]);
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
    public function update( $id)
    {
        $comment = Comment::find($id);


        $comment->validated = true;


        // insertion de l'enregistrement dans la base de données
        $comment->save();

        return redirect('/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        if ($request->delete == 'valide') {
            $comments = Comment::find($id);
            $comments->delete();
        }
        return redirect()->route('comments.index');
    }
}
