
@extends('master')

@section('navbar')
    @parent

@endsection
@section('content')
    @guest
        Vous devez être administrateur pour accéder au contenu
    @else
        @if(Auth::user()->administrateur == true)
            <h2>La liste des Commentaires</h2>

            @if(!empty($comments))
                <ul>
                    @foreach($comments as $comment)
                        @if($comment->validated == false)
                            <li>Content : {{$comment->content}}</li>
                            <li>Auteur : {{$comment->utilisateur->name}} </li>
                            <form action="{{route('comments.update',$comment->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div>
                                    <button class="btn btn-success" type="submit">Valide</button>
                                </div>
                            </form>
                            <input type="button" onclick="location.href='comments/{{$comment->id}}?action=delete ';" value="Supprimer"/>
                            <br/>
                        @endif
                    @endforeach
                </ul>
            @else
                <h3>aucun commentaire</h3>
            @endif
        @else
        Vous devez être administrateur pour accéder au contenu
        @endif
    @endif


@endsection
