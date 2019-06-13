@extends ('master')
@section('title')
Generos
@endsection
@section('content')
@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
<section>
    <ul>
        @foreach ($genres as $genre)
        <li><a href="/genres/{{$genre->id}}">{{$genre->name}}</a></li>
        @endforeach
    </ul>
</section>
<hr>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
@endsection