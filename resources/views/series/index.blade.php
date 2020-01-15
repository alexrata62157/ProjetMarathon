@extends('master') @section('title', 'Liste des Séries') @section('navbar') @parent @endsection @section('content') @if(!empty($series))
<div class="container trie">

    <div>
        <select class="bouton selecteur" name="genre" id="genre" onchange="serieByGenre(this.value)">
            <option value="All" @if($genreId=='All' ) selected @endif>Genres</option>
            @foreach($genres as $genre)
            <option value="{{$genre->id}}" @if($genre->id == $genreId) selected @endif>{{$genre->nom}}</option>
            @endforeach
        </select>

        <select class="bouton selecteur" name="annee" id="annee" onchange="serieByAnnee(this.value)">
            <option value="All" @if($annee=='All' ) selected @endif>Années</option>
            @foreach($premiereAnnees as $d)
            <option @if($annee==$d[ 'annee']) selected @endif>{{$d['annee']}}</option>
            @endforeach
        </select>

        <form>
            <input type="text" name="search" placeholder="Recherche">
            <input type="submit" class="bouton selecteur"  value="Chercher">
        </form>
    </div>

</div>

<div class="page-series">
    @foreach($series as $serie)

    <a href="{{ route('series.show', array($serie->id)) }}">
                    <img src="{{url($serie->urlImage)}}" />
                    <div class="real-over">
                        <!--
                        <p>{{$serie->premiere}}</p>-->
                        <p class="nom-serie">{{$serie->nom}}</p>
                        <p class="note">{{$serie->note}}/10</p>
                    </div>
                </a> @endforeach
</div>

@else
<h3>Aucune Série</h3> @endif

<script>
    function serieByAnnee(value) {
        //location.replace("http://localhost:8000/series?annee=" + value);
        location.replace("{{ route("series.index") }}?annee="+value);
    }

    function serieByGenre(value) {
        location.replace("{{ route("series.index") }}?genre=" + value);
    }

</script>

@endsection