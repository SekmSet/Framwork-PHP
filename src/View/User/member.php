<h2>Les membres</h2>
<hr>

@foreach($all_members as $value)
<h3> {{$value['nom']}} {{$value['prenom']}}</h3>
<p> {{$value['ville']}} - {{$value['cpostal']}}</p>
<hr>
@endforeach