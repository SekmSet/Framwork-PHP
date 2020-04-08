ID de l'utilisateur a afficher : {{$id}}

@if($id === 1)
je suis ID 1

@elseif($id > 1)
je suis un ID plus grand que  1

@else
je suis un ID vide…

@endif

@empty($var)
<!-- $var is "empty" -->
@endempty

@isset($id)
<!-- $id is defined and is not null… -->
@endisset


@foreach($users as $user)
<p>this user {{$user->id}}</p>
@endforeach