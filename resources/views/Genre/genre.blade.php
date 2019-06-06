@extends ('master')

@section('title')
{{$genre->name}}
@endsection
@section('content')
<section>
    <ul>
        @forelse ($movies as $movie)
        <li>{{$movie->title}}</li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
        <a href="/genres" class="btn btn-info">VOLVER</a>
</section>
@endsection