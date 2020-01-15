

@extends('master')

@section('navbar')
    @parent

@endsection
@section('content')
    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3>Suppression d'un commentaire</h3>
        @endif
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <p><strong>Commentaire de : </strong>{{$comments->utilisateur->name}}</p>
        <p><strong>Content : </strong>{{$comments->content}}</p>
    </div>


    @if($action == 'delete')
        <form action="{{route('comments.destroy',$comments->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" name="delete" value="valide">Valide</button>
                <button type="submit" name="delete" value="annule">Annule</button>
            </div>
        </form>
    @else
        <div>
            <a href="{{route('comments.index')}}">Retour à la liste</a>

        </div>
    @endif

@endsection
