@extends ('master')
@section('title')
Actors
@endsection
@section('content')
<h1>Actores</h1>
<div class="md-form mt-0">
    @if (!isset($_GET['search'])) 
    <form action="actors/search" method="get">
        <input type="text" name="search">
        <button type="submit" class="btn peach-gradient">Search</button>
    </form>
    @endif
</div>
<hr>
<section>
        <a href="/actors/create" class="btn btn-info">AGREGAR ACTOR</a>
</section>
<hr>
<section>
        @if (isset($_GET['search']))
        <a href="/actors" class="btn btn-info">LIMPIAR</a>
        @endif
        @if (!isset($_GET['search']))
        <a href="/" class="btn btn-info">VOLVER</a>
        @endif
</section>
<hr>
<section>
    <ul>
        @forelse ($actors as $actor)
        <li><a href="/actor/{{$actor->id}}">{{$actor->getNombreCompleto()}}</a></li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
@endsection
