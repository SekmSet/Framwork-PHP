<h2>Nos job</h2>

@foreach($jobs as $value)
<p> {{$value['nom']}} </p>
<p> Salaire : {{$value['salaire']}} </p>
<p> Cadre : {{$value['cadre']}} </p>

<hr>
@endforeach