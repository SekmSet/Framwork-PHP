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

    <ul>
        <li><a href="#">Modifier</a></li>
        <li><a href="#">Supprimer </a></li>
        <li><a href="#">Ajouter à mon historique</a></li>
    </ul>
@endempty
