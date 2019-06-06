@extends ('master')
@section('title')
Generos
@endsection
@section('content')
<section>
    <ul>
        @forelse ($genres as $genre)
        <li><a href="/genre/{{$genre->id}}">{{$genre->name}}</a></li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
    <a href="/" class="btn btn-info">VOLVER</a>
</section>
@endsection