@if(Auth::user()->id == $user->id)
<form action="{{route('profil.update',$user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification de votre profil</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="email"><strong>Mail :</strong></label>
        <input type="text" class="form-control" id="email" name="email"
               value="{{ $user->email}}">
    </div>
    <div>
        <label for="avatar"><strong>URL de l'avatar :</strong></label>
        <input type="text" class="form-control" id="avatar" name="avatar"
               value="{{ $user->avatar}}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
@else
Tu n'as pas accès à cette page
@endif