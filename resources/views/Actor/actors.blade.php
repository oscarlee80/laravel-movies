@extends ('master')
@section('title')
Actors
@endsection
@section('content')
<div class="d-flex md-form mt-0">
    <a href="#" onclick="history.back();" class="btn btn-primary btn-lg" role ="button" style="margin-left : 15px"><i class="fas fa-arrow-left"></i></a>
    <a href="/actors/create" class="btn btn-success btn-lg " style="margin-left : 15px"><i class="fas fa-user-plus"></i></a>
    @if (!isset($_GET['search'])) 
    <form action="actors/search" method="get" style= "margin-left : 15px; margin-top:7px">
        <input type="text" name="search">
        <button type="submit" class="btn peach-gradient">Search</button>
    </form>
    @endif
</div>
<hr>
<section>
    @if (isset($_GET['search']))
    <h4>Resultados de : {{$_GET['search']}}</h4>
    @endif
    <ul class="list-group">
        @foreach ($actors as $actor)
        <a href="/actors/{{$actor->id}}" class="list-group-item" style="width : 13%">{{$actor->getNombreCompleto()}}</a>
        @endforeach
    </ul>
@endsection
