<h2>Liste des films</h2>

@foreach($all_movies as $value)
<p> {{$value['titre']}} </p>
<ul>
    <li><a href="<?= BASE_URI?>/movies/{{$value['titre']}}">Voir plus</a></li>
</ul>
<hr>
@endforeach