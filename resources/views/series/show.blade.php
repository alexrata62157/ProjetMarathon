@extends('master') @section('navbar') @parent @endsection @section('content')
<div>
    @if($action == 'delete')
    <h3>Suppression d'une série</h3> @else @endif

</div>
    <div class='affiche-screen'>
        <p><img src="{{url($serie->urlImage)}}"></p>

    </div>
    <div id="Avis">

        <h3><strong>Avis :</strong></h3> @if(($serie->avis)!=null)
            <hr class="mt-2 mb-2"><div style="max-width: 70%; text-align: justify">{{$serie->avis}}</div> @else
            <h3>Aucun avis</h3> @endif
        <h3><strong>Avis vidéo :</strong></h3> @if(($serie->urlAvis)!=null)
            <hr class="mt-2 mb-2"> <embed src={{$serie->urlAvis}} autostart="false" height="200" width="320" /> @else
            <h3>Aucun avis</h3> @endif

    </div>
    @guest @else @if(Auth::user()->administrateur == true)
                     <div class="top">
        <input type="button" class="bouton connexion" onclick="location.href='{{$serie->id}}/edit';" value="Ajouter Avis" /> </div>@endif @endif
    <div class='description container'>
        <p class='titre'>{{$serie->nom}}</p>
        <span> Année de sortie : {{$serie->premiere}} </span>
        <span> | </span>
        <span>  Langue : {{$serie->langue}} </span>

        <div class='synopsis'>{!!$serie->resume!!}</div>
    </div>


    <div class=' note'>

        <p class='note-chiffre'> {{$serie->note}}/10 </p>
    </div>

    @if(count($genres) != 0)

        <ul class="categgenre">

            @foreach($genres as $genre)
                <li class="genre">{{$genre->nom}}</li>
                <br/> @endforeach
        </ul>
    @else
        <h3>Aucun genre</h3> @endif


    <div id="Saison">
        <div>
            @for($i=1;$i<=$max;$i++)
                <br />
                <div id={{$i}}>
                    <h1>Saison {{$i}} : </h1>
                    <div class=" page-episodes">
                        @foreach($episodes as $episode)
                            @if(($episode->saison)==$i)

                                <a href="{{route('episodes.show', array($episode->id)) }}">
                                    @if(!is_null($episode->urlImage))
                                        <img src="{{url($episode->urlImage)}}" />
                                        @else
                                        <img src="https://static.wixstatic.com/media/2b3793_92a54ffb823e4d4682da1c88e9aa4419~mv2.jpg/v1/fill/w_1899,h_1068,al_c,q_90,usm_0.66_1.00_0.01/2b3793_92a54ffb823e4d4682da1c88e9aa4419~mv2.webp" style="width: 250px; height: 140px"/>
                                    @endif
                                    <div class="real-over">
                                        <p class="nom-serie">{{$episode->numero}}</p>
                                        <p class="note">{{$episode->nom}}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div id="Commentaire" >
        <h1>Commentaire</h1>
        <div class="categcomment container">
            @guest
                <p class="forcomment">Inscrivez/Connectez vous pour entrer un commentaire</p>
            @else
                <div class="avisBis">
                    <form action="{{route('comments.store')}}" method="POST">
                        {!! csrf_field() !!}
                        <div style="display: none">
                            <input type="number" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                        </div>
                        <div style="display: none">
                            <input type="number" name="serie_id" id="serie_id" value="{{$serie->id}}" />
                        </div>
                        <div>
                            <label for="content">Entrer un commentaire:</label>
                            <br />
                            <textarea id="content" name="contenu"></textarea>
                        </div>
                        <div>
                            <label for="note">Note / 10 :</label>
                            <br />
                            <input type="number" name="note" id="note" min="0" max="10" />
                        </div>
                        <div>
                            <button class="btn btn-success bouton" type="submit">Valide</button>
                        </div>
                    </form>
                </div>
            @endguest

            @if(count($comments) != 0) @foreach($comments as $com)  @if($com->validated == true)
                <div class="info">
                    <div class='profil-img'>
                        <img src="{{$com->utilisateur->avatar}}" />
                    </div>
                    <div class="caracteristiques">
                        <span class="user-name"> {{$com->utilisateur->name}} </span>
                        <span class="date">  publié le {{$com->created_at}} </span>
                        <span>{{$com->note}}/10</span>
                        <p class="commentairetext"> {{$com->content}} </p>
                    </div>
                </div>
                @endif
            @endforeach

        </div>
        @else
            <h3>Aucun commentaire</h3> @endif @if($action == 'delete')
            <form action="{{route('series.destroy',$serie->id)}}" method="POST">
                @csrf @method('DELETE')
                <div class="text-center">
                    <button type="submit" name="delete" value="valide">Valide</button>
                    <button type="submit" name="delete" value="annule">Annule</button>
                </div>
            </form>
        @else @endif
    </div>



    <div>
        <a href="{{route('series.index')}}">Retour à la liste</a>

    </div>


@endsection