<h2>Liste des films</h2>

<form method="post" action="<?= BASE_URI ?>/movies/new">
    <button  class="btn btn-primary">Ajouter un film</button>
</form>

@foreach($all_movies as $value)
    <h3> {{$value['titre']}} </h3>
    <ul>
        <li>
            <a href="<?= BASE_URI ?>/movies/{{$value['id_film']}}">Voir plus</a>
        </li>
    </ul>
    <hr>
@endforeach