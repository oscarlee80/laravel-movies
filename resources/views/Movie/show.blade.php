@extends ('master')

@section('title')
{{$movie->title}}
@endsection
@section('content')
<section>
    <h2>Titulo: {{$movie->title}}</h2>
    <h3>Premios: {{$movie->awards}}</h3>
    <h3>Duracion: {{$movie->length}} minutos</h3>
    <h3>Genero: @if(!empty($movie->genre))
                    {{$movie->genre->name}}
                @else Desconocido
                @endif
    </h3>
    <h3>Actores: </h3>    
        <ul>
            @foreach ($movie->actors as $actor)
                <li><a href="../actors/{{$actor->id}}">{{$actor->getNombreCompleto()}}</a></li>
            @endforeach
        </ul>
    
</section>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>
@endsection