@extends ('master')

@section('title')
Movies
@endsection

@section('content')
<h1>Peliculas</h1>
<div class="md-form mt-0">
    @if (!isset($_GET['search'])) 
    <form action="movies/search" method="get">
        <input type="text" name="search">
        <button type="submit" class="btn peach-gradient">Search</button>
    </form>
    @endif
</div>
<hr>
<section>
        <a href="/movies/create" class="btn btn-info">AGREGAR PELICULA</a>
</section>
<br>
<section>
        @if (isset($_GET['search']))
        <a href="/movies" class="btn btn-info">LIMPIAR</a>
        @endif
        @if (!isset($_GET['search']))
        <a href="/" class="btn btn-info">VOLVER</a>
        @endif
</section>
<hr>
<section>
    <ul>
        @forelse ($movies as $movie)
        <li><a href="/movie/{{$movie->id}}">{{$movie->title}}</a></li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>

@endsection
