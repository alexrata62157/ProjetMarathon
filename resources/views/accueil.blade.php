@extends('master')



@section('navbar')
    @parent
@endsection
@section('content')
    @if(!empty($series))
        <div class="home-tendances" style="margin-bottom: 20px;">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img style="height: 100vh" src="https://cdn.discordapp.com/attachments/388743318911320079/657183885825802240/HORIZON.png"/>
                </div>






        <div class="critiques container">
            <h1>Nos dernières critiques</h1>
            <div>
                @foreach($nouveautes as $nouveaute)
                    <div class="articles-critiques">
                        <div>
                            <a href='{{route('series.show', array($nouveaute->id))}}'><img class="critiques-images" src="{{url($nouveaute->urlImage)}}"></a>
                        </div>
                        <h2>Critique - {{$nouveaute->nom}}</h2>
                        <p>{{$nouveaute->avis}}</p>
                        <a href='{{route('series.show', array($nouveaute->id))}}' class="bouton suite">Lire la suite</a>
                    </div>

                <!--
                    <div class="card text-center">
                        <a href='{{route('series.show', array($nouveaute->id))}}'><img src="{{url($nouveaute->urlImage)}}"></a>
                        <div class="card-body">
                            <h5 class="card-title">Nom :{{$nouveaute->nom}} </h5>
                            <p>Critique :{{$nouveaute->avis}} </p>
                        </div>
                </div>
                -->
                @endforeach
            </div>
        </div>

    @else
        <h3>Aucun jeux</h3>
    @endif

@endsection