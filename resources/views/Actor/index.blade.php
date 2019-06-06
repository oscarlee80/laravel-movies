@extends ('master')
@section('title')
Actors
@endsection
@section('content')
<section>
    <ul>
        @forelse ($actors as $actor)
        <li>{{$actor['name']}}</li>
        @empty
        No hay Resultados
        @endforelse
    </ul>
</section>
<section>
        <a href="/">VOLVER</a>
</section>
    
@endsection