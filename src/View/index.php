<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Pie PHP</title>
</head>
<body>

<div class="container">
    <div class="row">
        <header>
            <h1> My Cinéma </h1>
            <nav>
                <ul>
                    <li><a href="<?= BASE_URI?>/movies">Films</a></li>
                    <li><a href="<?= BASE_URI?>/salle">Salles</a></li>
                    <li><a href="<?= BASE_URI?>/subscription">Abonnement</a></li>
                    <li><a href="<?= BASE_URI?>/prices">Tarif</a></li>
                    <li><a href="<?= BASE_URI?>/job">Recrutement</a></li>
                    <li><a href="<?= BASE_URI?>/members">Liste des membres</a></li>
                    @isnotlog
                    <li><a href="<?= BASE_URI?>/login">Connexion</a></li>
                    <li><a href="<?= BASE_URI?>/register">Inscription</a></li>
                    @else
                    <li><a href="<?= BASE_URI?>/profil">Profil</a></li>
                    <li><a href="<?= BASE_URI?>/history">Mon historique film</a></li>
                    <li><a href="<?= BASE_URI?>/logout">Déconnexion</a></li>
                    @endislog
                </ul>
            </nav>
        </header>
    </div>

    <?= $view ?>

</div>
</body>
</html>