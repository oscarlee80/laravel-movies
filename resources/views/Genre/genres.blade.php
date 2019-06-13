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
<b><h2 style="margin-left : 100px">G E N E R O S</h2></b>
<hr align="left" width="380px">
<div class="d-flex md-form mt-0" style="margin-left : 115px">
    <a href="/" class="btn btn-primary btn-lg" role ="button" style="margin-left : 15px"><i class="fas fa-arrow-left"></i></a>
    <a href="/genres/create" class="btn btn-success btn-lg " style="margin-left : 15px"><i class="fas fa-plus-square"></i></a>
</div>
<hr align="left" width="380px">
<section>
    <ul class="list-group" style = "margin-left : 25px">
        @foreach ($genres as $genre)
        <a href="/genres/{{$genre->id}}" class="list-group-item list-group-item-success" style="width : 330px">{{$genre->name}}</a>
        @endforeach
    </ul>
</section>
@endsection

