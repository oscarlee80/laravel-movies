@extends ('master')

@section('title')
{{$actor['name']}}
@endsection
@section('content')
<section>
    <h2>Nombre: {{$actor['name']}}</h2>
    <h3>Premios: {{$actor['awards']}}</h3>
    <h3>Mejor Pelicula: {{$actor['best_movie']}}</h3>
</section>
@endsection