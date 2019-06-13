@extends ('master')
@section('title')
Resultados de la busqueda
@endsection
@section('content')
<div class="d-flex md-form mt-0">
    <a href="#" onclick="history.back();" class="btn btn-primary btn-lg" role ="button" style="margin-left : 6.5%"><i class="fas fa-arrow-left"></i></a>
</div>
<hr align="left" width="15%">

@if(empty($movies) || empty($actors))
<div class="alert alert-danger" role="alert" style="width : 10%; margin-left : 3%">
    <h3>No hay resultados</h3>
</div>
@endif
@if (count($movies) > 0)
    <section>
        <h3 style="margin-left : 2.5%">Peliculas encontradas</h3>
        <ul class="list-group" style="margin-left : 1%">
            @foreach ($movies as $movie)
            <li><a href="/movies/{{$movie->id}}" class="list-group-item list-group-item-warning" style="width : 13%">{{$movie->title}}</a></li>
            @endforeach
        </ul>
    </section>
    <br>
@endif
@if (!empty($actors))
    <section>
        <h3 style="margin-left : 2.5%">Actores encontrados</h3>
        <ul class="list-group" style="margin-left : 1%">
            @foreach ($actors as $actor)
            <a href="/actors/{{$actor->id}}" class="list-group-item list-group-item-info" style="width : 13%">{{$actor->getNombreCompleto()}}</a>
            @endforeach
        </ul>
    </section>
    <br>
@endif
@endsection