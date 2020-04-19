<h2>Genre</h2>

<form method="post" action="<?= BASE_URI ?>/genre/create">
    <div class="form-group">
        <label for="genre">Nouveau genre </label>
        <input type="text" class="form-control" name="nom" id="genre">
    </div>

    <button class="btn btn-primary" >Ajouter un genre</button>
</form>

@foreach ($all_genre as $genre)
    <h3>{{$genre['nom']}}</h3>
        <ul>
            <li>
                <form action="">
                    <button class="btn btn-primary" >Option</button>
                </form>
                <ul>
                    <li><a href="<?= BASE_URI ?>/genre/delete/{{$genre['id_genre']}}">Supprimer ce genre</a></li>
                    <li><a href="<?= BASE_URI ?>/genre/change/{{$genre['id_genre']}}">Modifier ce genre</a></li>
                </ul>
            </li>

        </ul>
@endforeach