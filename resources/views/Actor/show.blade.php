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
    @if (count($actor->movies) > 0)
        <ul>
            @foreach ($actor->movies as $movie)
                <li>{{$movie->title}}</li>
            @endforeach
        </ul>
    @else
    No tiene peliculas asociadas.
    @endif
    </h4>
</section>
<hr>
<div class ="d-flex">
<a href="#" onclick="history.back();" class="btn btn-primary btn-lg" role ="button" style="margin-left : 15px"><i class="fas fa-arrow-left"></i></a>
<a href="/actors/{{$actor->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-user-edit"></i></a>
<form method="POST" action="{{$actor->id}}">
    @method('DELETE')
    @csrf
    <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-user-times"></i></button>
</form>
</div>
@endsection
