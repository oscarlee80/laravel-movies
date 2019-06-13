@extends ('master')
@section('title')
Actores
@endsection
@section('content')
<b><h2 style="margin-left : 100px">A C T O R E S</h2></b>
<hr align="left" width="380px">
<div class="d-flex md-form mt-0" style="margin-left : 115px">
    <a href="/" class="btn btn-primary btn-lg" role ="button" style="margin-left : 15px"><i class="fas fa-arrow-left"></i></a>
    <a href="/actors/create" class="btn btn-success btn-lg " style="margin-left : 15px"><i class="fas fa-user-plus"></i></a>
</div>
<hr align="left" width="380px">
<section>
    <ul class="list-group" style = "margin-left : 25px">
        @foreach ($actors as $actor)
        <a href="/actors/{{$actor->id}}" class="list-group-item list-group-item-info" style="width : 330px">{{$actor->getNombreCompleto()}}</a>
        @endforeach
    </ul>
</section>
@endsection
