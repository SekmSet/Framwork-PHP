<h2>Les abonnements</h2>


@foreach($subs as $value)
<p> {{$value['nom']}} </p>
<p> {{$value['resum']}} </p>
<p> Prix (€) : {{$value['prix']}} </p>
<p> Durée (jour.s) : {{$value['duree_abo']}} </p>

<hr>
@endforeach