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
<div class="alert alert-danger" role="alert" style="width : 10%; margin-left : 30px">
    <h3>No hay resultados</h3>
</div>
@endif
@if (count($movies)>0)
    <section>
        <h3 style="margin-left : 65px">Peliculas encontradas</h3>
        <ul class="list-group" style="margin-left : 30px">
            @foreach ($movies as $movie)
            <li><a href="/movies/{{$movie->id}}" class="list-group-item list-group-item-warning" style="width : 320px">{{$movie->title}}</a></li>
            @endforeach
        </ul>
    </section>
    <br>
@endif
@if (isset($series))
    <section>
        <h3 style="margin-left : 75px">Series encontradas</h3>
        <ul class="list-group" style="margin-left : 30px">
            @foreach ($series as $serie)
            <li><a href="/series/{{$serie->id}}" class="list-group-item list-group-item-warning" style="width : 320px">{{$serie->title}}</a></li>
            @endforeach
        </ul>
    </section>
    <br>
@endif
@if (isset($actors))
    <section>
        <h3 style="margin-left : 70px">Actores encontrados</h3>
        <ul class="list-group" style="margin-left : 30px">
            @foreach ($actors as $actor)
            <a href="/actors/{{$actor->id}}" class="list-group-item list-group-item-info" style="width : 320px">{{$actor->getNombreCompleto()}}</a>
            @endforeach
        </ul>
    </section>
    <br>
@endif
@endsection