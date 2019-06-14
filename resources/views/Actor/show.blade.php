@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')

<div class="card" style="width: 18rem;" style="margin-left : 25px">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">{{$actor->getNombreCompleto()}}</h4>
      <p class="card-text">Puntaje: {{$actor->rating}}</p>
      @if (!empty($actor->movies))      
      <p class="card-text">Pelicula favorita: {{$actor->favorite_movie->title}}</p>
      @endif
      <p class="card-text">Filmografia:</p>
    </div>
    <ul class="list-group list-group-flush">
        @if (!empty($actor->movies))
        @foreach ($actor->movies as $movie)
        <li class="list-group-item">{{$movie->title}}</li>
        @endforeach
        @endif
    </ul>
    <div class="card-body">
        <a href="#" onclick="history.back();" class="btn btn-primary btn-lg" role ="button" style="margin-left : 15px"><i class="fas fa-arrow-left"></i></a>
        <a href="/actors/{{$actor->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-user-edit"></i></a>
        <form method="POST" action="{{$actor->id}}">
            @method('DELETE')
            @csrf
            <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-user-times"></i></button>
        </form>
    </div>
  </div>
@endsection
