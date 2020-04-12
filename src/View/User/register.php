@notempty($errors)
<div class="alert alert-danger" role="alert">
    @foreach ($errors as $value)
    {{$value}}
    @endforeach
</div>
@endempty


<form class="form-signin" method="post" action="<?= BASE_URI ?>/register_new">
    <h1 class="h3 mb-3 font-weight-normal">Insciption</h1>

    <label for="nom">Nom</label>
    <input type="text" id="nom" class="form-control" placeholder="Joly" name="nom" required autofocus>

    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" class="form-control" placeholder="Priscilla" name="prenom" required >

    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" placeholder="prisclla.joly@orange.fr" name="email" required>

    <label for="mdp">Password</label>
    <input type="password" id="mdp" class="form-control" placeholder="password44" name="mdp" required>

    <label for="date_naissance">Date de naissance</label>
    <input type="date" id="date_naissance" class="form-control" placeholder="11/03/1995" name="date_naissance" required >

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" class="form-control" placeholder="56 rue abbe boisard " name="adresse" required >

    <label for="cpostal">Code postal</label>
    <input type="text" id="cpostal" class="form-control" placeholder="69003" name="cpostal" required >

    <label for="ville">Ville</label>
    <input type="text" id="ville" class="form-control" placeholder="Lyon" name="ville" required >

    <label for="pays">Pays</label>
    <input type="text" id="pays" class="form-control" placeholder="France" name="pays" required >

    <hr>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
</form>