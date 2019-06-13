@extends ('master')

@section('title')
{{$genre->name}}
@endsection
@section('content')
<section>
    <ul> 
        @forelse ($genre->movies as $movie)
        <li><a href="../movie/{{$movie->id}}">{{$movie->title}}</a></li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
        <a href="/genres" class="btn btn-info">VOLVER</a>
</section>
@endsection