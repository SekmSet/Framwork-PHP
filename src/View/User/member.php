<h2>Les membres</h2>

@foreach($all_members as $value)
        <p> {{$value['nom']}} {{$value['prenom']}}</p>
        <p> {{$value['ville']}} - {{$value['cpostal']}}</p>
 <hr>
@endforeach