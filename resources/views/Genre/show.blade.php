@extends ('master')

@section('title')
{{$genre->name}}
@endsection
@section('content')
<section>
    <ul> 
        @foreach ($genre->movies as $movie)
        <li><a href="../movies/{{$movie->id}}">{{$movie->title}}</a></li>
        @endforeach
    </ul>
</section>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>
@endsection