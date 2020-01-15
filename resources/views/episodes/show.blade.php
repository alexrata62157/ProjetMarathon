@extends('master')
@section('content')
    <div class="episode-indivi container">
        <h1><strong>Affichage d'un épisode</strong></h1>

        <div>
            @if(!is_null($episodes->urlImage))
                <img src="{{url($episodes->urlImage)}}"/>
            @endif
            <p>Nom : {{$episodes->nom}}</p>
            <p>Résumé : {!! $episodes->resume!!}</p>
        </div>


        @guest
            Vous devez être connecté pour accéder a ce contenu
        @else
            <div class="prevnet">
            @if(Auth::user()->aVuEpisode($episodes->id) )
                <input class="bouton" type="button" value="Déjà vu"/>
            @else
                <input type="button" class="bouton" onclick="location.href='{{$episodes->id}}/seenEpisode';" value="A voir"/>
            @endif
        @endguest
        @if(isset($pred))
            <a href="{{route('episodes.show', $pred)}}"><strong class="connexion bouton">Previous Episode</strong></a>
        @endif
        @if(isset($next))
            <a href="{{route('episodes.show', $next)}}"><strong class="connexion bouton">Next Episode</strong></a>

        @endif
            </div>
    </div>
@endsection

