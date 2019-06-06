@extends ('master')
@section('title')
Genres
@endsection
@section('content')
<section>
    <ul>
        @forelse ($genres as $key => $genre)
        <li>{{$genres[$key]}}</li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
        <a href="/">VOLVER</a>
</section>
@endsection