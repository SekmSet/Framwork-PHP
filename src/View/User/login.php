@notempty($errors)
<div class="alert alert-danger" role="alert">
    @foreach ($errors as $value)
    {{$value}}
    @endforeach
</div>
@endempty


<form class="form-signin" method="post" action="<?= BASE_URI ?>/login_check">
    <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="mdp" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
</form>