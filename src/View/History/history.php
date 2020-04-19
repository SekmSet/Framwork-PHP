<h2>Mon historique</h2>

@foreach($my_history as $key => $value)
<p>{{$value['titre']}}</p>
<p>Mon avis : {{$value['avis']}}</p>
<ul>
    <li><a href="<?= BASE_URI ?>/movies/{{$value['id_film']}}">Voir la fiche </a></li>
    <li><a href="<?= BASE_URI ?>/history/movie/delete/{{$value['id_film']}}">Supprimer de mon historique </a></li>
</ul>
@endforeach