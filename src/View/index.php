<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pie PHP</title>
    <link rel="icon" type="image/png" href="<?= BASE_URI ?>/webroot/assets/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URI?>/webroot/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h1 class="my-0 mr-md-auto font-weight-normal"><a href="<?= BASE_URI ?>/">My Cinéma</a></h1>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/movies">Films</a>
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/genres">Genres</a>
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/salle">Salles</a>
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/subscription">Abonnement</a>
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/prices">Tarif</a>
        <a class="p-2 text-dark" href="<?= BASE_URI ?>/job">Recrutement</a>
    </nav>

    @isnotlog
    <a class="btn btn-outline-primary" href="<?= BASE_URI ?>/login">Connexion</a>
    <a class="btn btn-outline-primary" href="<?= BASE_URI ?>/register">Inscription</a>
    @else
    <a class="p-2 text-dark" href="<?= BASE_URI ?>/members">Liste des membres</a>
    <a class="btn btn-outline-primary" href="<?= BASE_URI ?>/profil">Profil</a>
    <a class="btn btn-outline-primary" href="<?= BASE_URI ?>/history">Mon historique film</a>
    <a class="btn btn-outline-primary" href="<?= BASE_URI ?>/logout">Déconnexion</a>
    @endislog
</div>

<div class="container">
    <?= $view ?>
</div>

<script src="<?= BASE_URI?>/webroot/js/jquery.js"></script>
<script src="<?= BASE_URI?>/webroot/js/main.js"></script>
</body>
</html>