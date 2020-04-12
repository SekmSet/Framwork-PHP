<h2>Mon historique</h2>

@foreach($my_history as $key => $value)
<p>{{$value['titre']}}</p>
<ul>
    <li><a href="<?= BASE_URI ?>/movies/{{$value['titre']}}">Voir la fiche </a></li>
    <li><a href="#">Supprimer de mon historique </a></li>
</ul>
@endforeach