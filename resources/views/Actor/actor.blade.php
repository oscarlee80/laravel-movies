@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')
<section>
    <h2>Nombre: {{$actor->getNombreCompleto()}}</h2>
    <h3>Puntaje: {{$actor->rating}}</h3>
    <h3>Peliculas:</h3>
    <h4>
    @if (!empty($movies))
        <ul>
            @foreach ($movies as $movie)
                <li>{{$movie->title}}</li>
            @endforeach
        </ul>
    @else
    No tiene peliculas asociadas.
    @endif
    </h4>
</section>

<section>
        <a href="/actors" class="btn btn-info">VOLVER</a>
</section>
<section>
@endsection