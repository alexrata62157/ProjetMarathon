
@guest
    Vous devez être administrateur pour accéder à cette page
@else
    @if(Auth::user()->administrateur == true)
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('series.update',$serie->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-center" style="margin-top: 2rem">
                <h3>Ajout/Modification de l'avis</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div>
                <label for="avis"><strong>Avis</strong></label>
                <textarea id="avis" name="avis">{{ $serie->avis }}</textarea>
            </div>
            <div>
                <label for="urlAvis"><strong>Avis Vidéo</strong></label>
                <input type="text" id="urlAvis" name="urlAvis"
                       value="{{ $serie->urlAvis }}">
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valide</button>
            </div>
        </form>
    @else
        Vous devez être administrateur pour accéder à cette page
    @endif
@endif
