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

<form action="<?= BASE_URI ?>/profil/changes" method="post" id="form_change_profil">

    <label for="nom">Nom : <input type="text" name="nom" id="nom_profil" value="{{$info['nom']}}"></label>
    <label for="prenom">Prenom : <input type="text" name="prenom" id="prenom_profil"
                                        value="{{$info['prenom']}}"></label>
    <label for="email">Email : <input type="text" name="email" id="email_profil" value="{{$info['email']}}"></label>
    <label for="date_naissance">Date de naissance :<input type="text" name="date_naissance" id="date_naissance"
                                                          value="{{$info['date_naissance']}}"></label>
    <label for="adresse">Adresse : <input type="text" name="adresse" id="adresse_profil"
                                          value="{{$info['adresse']}}"></label>
    <label for="cpostal">Code postal : <input type="text" name="cpostal" id="cpostal_profil"
                                              value="{{$info['cpostal']}}"></label>
    <label for="ville">Ville : <input type="text" name="ville" id="ville_profil" value="{{$info['ville']}}"></label>
    <label for="pays">Pays : <input type="text" name="pays" id="pays_profil" value="{{$info['pays']}}"></label>

    <button id="validate_button_profil"> Valider</button>
</form>

<form>
    <button id="button_changes_profil">Modifier mon profil</button>
</form>

<form action="<?= BASE_URI ?>/profil/delete" id="delete_account">
    <button id="button_delete_profil">Supprimer mon profil</button>
</form>