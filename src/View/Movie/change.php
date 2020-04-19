<h2>Modifier un film</h2>

<form method="post" action="">

    <div class="form-group">
        <label for="title">Titre<input value="{{$movie->titre}}" class="form-control" type="text" name="titre"></label>
    </div>

    <div class="form-group">
        <label for="resum">Résumé</label>
        <textarea class="form-control" id="resum" rows="3">{{$movie->resum}}</textarea>
    </div>

    <div class="form-group">
        <label for="date_debut_affiche">Date début affiche <input class="form-control" value="{{$movie->date_debut_affiche}}" type="text" placeholder="YYYY-MM-DD" name="date_debut_affiche"></label>
    </div>

    <div class="form-group">
        <label for="date_fin_affiche">Date fin affiche <input class="form-control" type="text"  value="{{$movie->date_fin_affiche}}" placeholder="YYYY-MM-DD" name="date_fin_affiche"></label>
    </div>

    <div class="form-group">
        <label for="duree">Durée (en minute) <input value="{{$movie->duree_min}}" class="form-control" type="text" name="duree_min"></label>
    </div>

    <div class="form-group">
        <label for="annee_prod">Année de production <input value="{{$movie->annee_prod}}" class="form-control" type="text" name="annee_prod"></label>
    </div>

    <select name="id_genre" id="gender-select">
        <option value="">--Please choose a gender--</option>
        @foreach ($all_genders as $gender)
        <option value="{{$gender['id_genre']}}"
        @if ($movie->id_genre === $gender['id_genre'])
            selected
        @endif
        >{{$gender['nom']}}</option>
        @endforeach
    </select>
    <select name="id_distrib" id="distrib-select">
        <option value="">--Please choose a distrib--</option>
        @foreach ($all_distribs as $distrib)
        <option value="{{$distrib['id_distrib']}}"
            @if ($movie->id_distrib === $distrib['id_distrib'])
                selected
            @endif
        >{{$distrib['nom']}}</option>
        @endforeach
    </select>
    <button class="btn btn-primary">Modifier</button>
</form>