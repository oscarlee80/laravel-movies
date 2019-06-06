@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')
<section>
    <h2>Nombre: {{$actor->getNombreCompleto()}}</h2>
    <h3>Puntaje: {{$actor->rating}}</h3>
    <h3>Peliculas:
    @if (!empty($movies))
        <ul>
            {{dd($movies)}}
            @foreach ($movies as $movie)
                {{$movie}}
            @endforeach
            {{dd($movie)}}
        </ul>
    @else
    No tiene peliculas asociadas.
    @endif
    </h3>
</section>

<section>
        <a href="/actors" class="btn btn-info">VOLVER</a>
</section>
<section>
@endsection