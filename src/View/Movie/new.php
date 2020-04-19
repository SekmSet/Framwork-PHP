<h2>Ajouter un nouveau film</h2>

<form method="post" action="">

    <div class="form-group">
        <label for="title">Titre<input class="form-control" type="text" name="titre"></label>
    </div>

    <div class="form-group">
        <label for="resum">Résumé</label>
        <textarea class="form-control" name="resum" id="resum" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="date_debut_affiche">Date début affiche <input class="form-control" type="text" placeholder="YYYY-MM-DD" name="date_debut_affiche"></label>
    </div>

    <div class="form-group">
        <label for="date_fin_affiche">Date fin affiche <input class="form-control" type="text"  placeholder="YYYY-MM-DD" name="date_fin_affiche"></label>
    </div>

    <div class="form-group">
        <label for="duree">Durée (en minute) <input class="form-control" type="text" name="duree_min"></label>
    </div>

    <div class="form-group">
        <label for="annee_prod">Année de production <input class="form-control" type="text" name="annee_prod"></label>
    </div>

    <select name="id_genre" id="gender-select">
        <option value="">--Please choose a gender--</option>
        @foreach ($all_genders as $gender)
            <option value="{{$gender['id_genre']}}">{{$gender['nom']}}</option>
        @endforeach
    </select>

    <select name="id_distrib" id="distrib-select">
        <option value="">--Please choose a distrib--</option>
        @foreach ($all_distribs as $distrib)
        <option value="{{$distrib['id_distrib']}}">{{$distrib['nom']}}</option>
        @endforeach
    </select>
    <button class="btn btn-primary">Ajouter</button>
</form>