<h2>Mon profil</h2>

@notempty($messages)
    @foreach ($messages as $value)
        {{$value}}
    @endforeach
@endempty