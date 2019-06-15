@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')
<div style="margin-left : 30px">
<div align="center" class="card" style="width: 18rem" >
    <div class="card-body">
      <h3 align="center" class="card-title">{{$actor->getNombreCompleto()}}</h3>
      <ul class="list-group list-group-flush">
          <li align="center" class="list-group-item"><b>Puntaje</b> 
          <h4>{{$actor->rating}}</h4></li>
          @if (!empty($actor->favorite_movie))      
          <li align="center" class="list-group-item"><b>Pelicula favorita</b> 
            <h5>{{$actor->favorite_movie->title}}</h5></li>
          @endif
          @if (count($actor->movies) > 0)
            <li align="center" class="list-group-item"><b>Filmografia</b>
              <ul class="list-group list-group-flush">
                  @foreach ($actor->movies as $movie)
                  <a href="/movies/{{$movie->id}}"><li align="center"><h5>{{$movie->title}}<h5></li></a>
                  @endforeach
          @endif
        </ul>
      </li>
    </ul>
  </div>
</div>
</div>
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 70px">
    <a href="/actors" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/actors/{{$actor->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-user-edit"></i></a>
    <form method="POST" action="{{$actor->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-user-times"></i></button>
    </form>
  </div>
@endsection
