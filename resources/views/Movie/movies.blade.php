@extends ('master')

@section('title')
Movies
@endsection

@section('content')
@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
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
        <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
        @endif
</section>
<hr>
<section>
    <ul>
        @foreach ($movies as $movie)
        <li><a href="/movies/{{$movie->id}}">{{$movie->title}}</a></li>
        @endforeach
    </ul>
</section>

@endsection
