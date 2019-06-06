@extends ('master')

@section('title')
Movies
@endsection
@section('content')
<section>
    <ul>
        @forelse ($movies as $movie)
        <li>{{$movie['title']}}</li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
        <a href="/">VOLVER</a>
</section>
@endsection
