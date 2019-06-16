@extends ('master')
@section('title')
{{$genre->name}}
@endsection
@section('content')
<div style="width: 350px">
    <b><h2 align="center">{{$genre->name}}</h2></b>
</div>
<hr align="left" width="350px">
@if (isset($error))
<div class="alert alert-danger" role="alert" style="width:300px; margin-left:25px">
    {{$error}}
</div>
@endif
@if (count($genre->movies) > 0)
<section style="width: 18rem; margin-left : 30px" >
    <h3 style="margin-left : 90px">Peliculas</h3>
    <ul class="list-group list-group-flush"> 
        @foreach ($genre->movies as $movie)
        <li class="list-group-item list-group-item-warning"><a href="../movies/{{$movie->id}}">{{$movie->title}}</a></li>
        @endforeach
    </ul>
</section>
@endif
@if (count($genre->series) >0) 
<section style="width: 18rem; margin-left : 30px" >
    <h3 style="margin-left : 110px">Series</h3>
    <ul class="list-group list-group-flush"> 
        @foreach ($genre->series as $serie)
        <li class="list-group-item list-group-item-success"><a href="../series/{{$serie->id}}">{{$serie->title}}</a></li>
        @endforeach
    </ul>
</section>
@endif
@if (count($genre->movies) > 0 || count($genre->series) > 0)
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 110px">
    <a href="/genres" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/genres/{{$genre->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
</div>
@else
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 70px">
    <a href="/genres" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/genres/{{$genre->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    <form method="POST" action="{{$genre->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@endif
@endsection