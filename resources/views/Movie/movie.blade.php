@extends ('master')

@section('title')
{{$movie->title}}
@endsection
@section('content')
<section>
    <h2>Titulo: {{$movie->title}}</h2>
    <h3>Premios: {{$movie->awards}}</h3>
    <h3>Duracion: {{$movie->length}} minutos</h3>
    <h3>Genero: @if(!empty($genre))
                    {{$genre->name}}
                @else Desconocido
                @endif
    </h3>
</section>
<section>
        <a href="/movies" class="btn btn-info">VOLVER</a>
</section>
@endsection