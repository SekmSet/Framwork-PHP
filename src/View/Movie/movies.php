<h2>Liste des films</h2>

<form method="post" action="<?= BASE_URI ?>/movies/new">
    <button>Ajouter un film</button>
</form>

@foreach($all_movies as $value)
    <p> {{$value['titre']}} </p>
    <ul>
        <li>
            <a href="<?= BASE_URI ?>/movies/{{$value['id_film']}}">Voir plus</a>
        </li>
    </ul>
    <hr>
@endforeach