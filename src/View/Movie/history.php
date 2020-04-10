<h2>Mon historique</h2>

@foreach($my_history as $key => $value)
    <p>{{$value['titre']}}</p>
@endforeach