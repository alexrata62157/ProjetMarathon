@extends('master')
@section('content')
    <div class="user">
        <div class="user1">
            <p><img class="avatar" src="{{ Auth::user()->avatar }}"></p>
            <p>Bienvenue</p>
            <p> {{ Auth::user()->name }}</p>
            <p> Mail : {{ Auth::user()->email}}</p>
            <input type="button" class="bouton selecteur" onclick="location.href='{{route('profil.edit',Auth::user()->id)}}'" value="Editer Profil" />
            @guest @else @if(Auth::user()->administrateur == true)
                <input type="button" class="bouton selecteur" onclick="location.href='{{route('comments.index')}}'" value="Gérer commentaires " />
                @endif
            @endguest
        </div>

            <div class="container">
                {{Auth::user()->commentaires()->count()}} commentaires <br />

                 {{Auth::user()->nbHeures()}} Minutes de visionnage
            </div>
            <div class="page-series" style="margin-top: 120px">
                @foreach(Auth::user()->commentaires as $c)

                    <a href="{{ route('series.show', array($c->serie->id)) }}">
                        <img src="{{url($c->serie->urlImage)}}" />
                        <div class="real-over">
                        <!--
                        <p>{{$c->serie->premiere}}</p>-->
                            <p class="nom-serie">{{$c->serie->nom}}</p>
                            <p class="note">{{$c->serie->note}}/10</p>
                        </div>
                    </a> @endforeach
            </div>


@endsection