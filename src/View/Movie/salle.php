<h2>Les salles</h2>

@foreach($all_salles as $value)
<p> {{$value['nom_salle']}} </p>
<p> Étage : {{$value['etage_salle']}} </p>
<p> Nombre de siège : {{$value['nbr_siege']}} </p>
<ul>
    <li><a href="<?= BASE_URI?>/salle/{{$value['nom_salle']}}">Voir le programme de cette salle</a></li>
</ul>
<hr>
@endforeach