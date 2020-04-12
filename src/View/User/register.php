<h1>Insciption</h1></>

<form action="<?= BASE_URI ?>/register_new" method="post">

    <label for="nom">Nom : <input type="text" name="nom" id="nom_profil"></label>
    <label for="prenom">Prenom : <input type="text" name="prenom" id="prenom_profil"></label>
    <label for="email">Email : <input type="text" name="email" id="email_profil"></label>
    <label for="mdp">Mot de passe<input type="password" name="mdp" id="mdp"> </label>
    <label for="date_naissance">Date de naissance :<input type="date" name="date_naissance" id="date_naissance"></label>
    <label for="adresse">Adresse : <input type="text" name="adresse" id="adresse_profil"></label>
    <label for="cpostal">Code postal : <input type="text" name="cpostal" id="cpostal_profil"></label>
    <label for="ville">Ville : <input type="text" name="ville" id="ville_profil"></label>
    <label for="pays">Pays : <input type="text" name="pays" id="pays_profil"></label>

    <button> S'inscrire</button>
</form>
