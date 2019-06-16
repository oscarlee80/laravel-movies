@extends ('master')

@section('title')
{{$movie->title}}
@endsection
@section('content')
<div style="margin-left : 30px">
    <div align="center" class="card" style="width: 18rem" >
        <div class="card-body">
            <h3 align="center" class="card-title">{{$movie->title}}</h3>
            <ul class="list-group list-group-flush">
                <li align="center" class="list-group-item"><b>Puntaje</b>
                    <h4>{{$movie->rating}}</h4></li>
                <li align="center" class="list-group-item"><b>Premios</b>
                    <h4>{{$movie->awards}}</h4></li>
                <li align="center" class="list-group-item"><b>Duracion</b>
                    <h4>{{$movie->length}} minutos</h4></li>
                <li align="center" class="list-group-item"><b>Fecha de Estreno</b>
                    <h4>{{$movie->fechaDeEstreno()}}</h4></li>
                @if (isset($movie->genre))
                <li align="center" class="list-group-item"><b>Genero</b>
                    <a href="/genres/{{$movie->genre->id}}"><h5>{{$movie->genre->name}}</h5></li></a>
                @endif
                @if (count($movie->actors) > 0)
                <li align="center" class="list-group-item"><b>Elenco</b>
                    <ul class="list-group list-group-flush">
                        @foreach ($movie->actors as $actor)
                        <a href="/actors/{{$actor->id}}"><li align="center" ><h5>{{$actor->getNombreCompleto()}}<h5></li></a>
                        @endforeach
                @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@if (count($movie->actors) > 0)
    <hr align="left" width="350px">
    <div class=" d-flex" style="margin-left : 110px">
        <a href="/movies" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
        <a href="/movies/{{$movie->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    </div>
@else
    <hr align="left" width="350px">
    <div class=" d-flex" style="margin-left : 70px">
        <a href="/movies" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
        <a href="/movies/{{$movie->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
        <form method="POST" action="{{$movie->id}}">
            @method('DELETE')
            @csrf
            <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
@endif
@endsection
