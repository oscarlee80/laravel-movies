@extends ('master')
<?php 
$genero = chunk_split($genre->name, 1, ' ');
?>
@section('title')
{{$genre->name}}
@endsection
@section('content')
<div style="width: 350px">
    <b><h2 align="center">{{$genre->name}}</h2></b>
</div>
<section style="width: 18rem; margin-left : 30px" >
    <ul class="list-group list-group-flush"> 
        @foreach ($genre->movies as $movie)
        <li class="list-group-item"><a href="../movies/{{$movie->id}}">{{$movie->title}}</a></li>
        @endforeach
    </ul>
</section>
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

@endsection