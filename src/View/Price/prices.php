<h2>Les prix</h2>

@foreach($reductions as $value)
<h3> {{$value['nom']}} </h3>

@notempty($value['date_debut'])
<p>Date début : {{$value['date_debut']}}</p>
@endempty

@notempty($value['date_fin'])
<p>Date fin : {{$value['date_fin']}}</p>
@endempty

<p> Pourcentage réduction : {{$value['pourcentage_reduc']}} % </p>

<hr>
@endforeach