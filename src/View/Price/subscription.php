<h2>Les abonnements</h2>


@foreach($subs as $value)
<h3> {{$value['nom']}} </h3>
<p> {{$value['resum']}} </p>
<p> Prix (€) : {{$value['prix']}} </p>
<p> Durée (jour.s) : {{$value['duree_abo']}} </p>

<hr>
@endforeach