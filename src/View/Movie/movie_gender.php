@notempty($errors)
    <div class="alert alert-danger" role="alert">
        @foreach ($errors as $value)
            {{$value}}
        @endforeach
    </div>
@endempty


@notempty($info)
    <h2>{{$info['titre']}}</h2>

    <p>Genre : {{$info['nom']}}</p>
    <p>Durée (minutes) : {{$info['duree_min']}}</p>
    <p>Année de production : {{$info['annee_prod']}}</p>
    <p>Date début affichage : {{$info['date_debut_affiche']}}</p>
    <p>Date fin affichage : {{$info['date_fin_affiche']}}</p>
    <p>{{$info['resum']}}</p>

    <hr>
@endempty

@islog
    <ul>
        <li><a href="<?= BASE_URI ?>/movies/change/{{$info['id_film']}}">Modifier</a></li>
        <li><a href="<?= BASE_URI ?>/movies/delete/{{$info['id_film']}}">Supprimer </a></li>
    </ul>

    <form method="post" action="<?= BASE_URI ?>/movies/add/history/{{$info['id_film']}}">
        <div class="form-group">
            <label for="avis">Mon avis </label>
            <textarea name="avis" class="form-control" id="avis" rows="3"></textarea>
        </div>
        <button class="btn btn-primary">Ajouter à mon historique</button>
    </form>
@endislog

