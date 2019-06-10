@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')
<h1>Actor</h1>
<hr>
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
<hr>
<section>
        <a href="/actor/{{$actor->id}}/edit" class="btn btn-info">EDITAR DATOS</a>
</section>
<br>
<form method="POST" action="{{$actor->id}}">
    @method('DELETE')
    @csrf
    <input class = "btn btn-danger" type="submit" value="BORRAR REGISTRO" />
</form>
<br>
<section>
        <a href="/actors" class="btn btn-info">VOLVER</a>
</section>
<section>
@endsection