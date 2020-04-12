<h1>Connexion</h1></>
<div>
    @notempty($errors)
    @foreach ($errors as $value)
    {{$value}}
    @endforeach
    @endempty

    <form method="post" action="<?= BASE_URI ?>/login_check">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="priscilla.joly@epitech.eu">

        <label for="mdp">Passeword</label>
        <input type="password" name="mdp" id="mdp">

        <button>Envoyer</button>
    </form>
</div>
