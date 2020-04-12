<h2>Mon profil</h2>

@notempty($messages)
@foreach ($messages as $value)
{{$value}}
@endforeach
@endempty

<p> {{$info['prenom']}} {{$info['nom']}}</p>
<p> Date de naissance : {{$info['date_naissance']}}</p>
<p>Email : {{$info['email']}}</p>
<p>Adresse : {{$info['adresse']}}</p>
<p>Code postal : {{$info['cpostal']}}</p>
<p>Ville : {{$info['ville']}}</p>
<p>Pays : {{$info['pays']}}</p>

<form class="form-signin" method="post" action="<?= BASE_URI ?>/profil/changes" id="form_change_profil">
    <label for="nom">Nom</label>
    <input type="text" id="nom" class="form-control" placeholder="Joly" name="nom" required autofocus value="{{$info['nom']}}">

    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" class="form-control" placeholder="Priscilla" name="prenom" required value="{{$info['prenom']}}">

    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" placeholder="prisclla.joly@orange.fr" name="email" required value="{{$info['email']}}">

    <label for="date_naissance">Date de naissance</label>
    <input type="date" id="date_naissance" class="form-control" placeholder="11/03/1995" name="date_naissance" required value="{{$info['date_naissance']}}">

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" class="form-control" placeholder="56 rue abbe boisard " name="adresse" required value="{{$info['adresse']}}">

    <label for="cpostal">Code postal</label>
    <input type="text" id="cpostal" class="form-control" placeholder="69003" name="cpostal" required value="{{$info['cpostal']}}">

    <label for="ville">Ville</label>
    <input type="text" id="ville" class="form-control" placeholder="Lyon" name="ville" required value="{{$info['ville']}}">

    <label for="pays">Pays</label>
    <input type="text" id="pays" class="form-control" placeholder="France" name="pays" required value="{{$info['pays']}}">

    <hr>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
</form>

<button id="button_changes_profil">Modifier mon profil</button>


<form action="<?= BASE_URI ?>/profil/delete" id="delete_account">
    <button id="button_delete_profil">Supprimer mon profil</button>
</form>