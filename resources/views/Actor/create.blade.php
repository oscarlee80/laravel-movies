@extends('master')
@section('content')
@if (isset($error))
<div class="alert alert-danger" role="alert" style="width:330px; margin-left:25px">
    Ese actor ya está registrado
</div>
@endif
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert" style="width:330px; margin-left:25px">
        <li>{{ $error }}</li>
    </div>
    @endforeach
</ul>
@endif
<h2 style= "margin-left : 120px">N U E V O</h2>
<h2 style= "margin-left : 120px">A C T O R</h2>
<hr align="left" width="380px">
<form method="POST" action="/actors/create" style="margin-left:25px">
    @csrf
    <div class="form-group">
        <label for="first_name">Nombre</label>
        <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control"  style="width : 330px;">
    </div>
    <div class="form-group">
        <label for="last_name">Apellido</label>
        <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control"  style="width : 330px;">
    </div>
    <div class="form-group">
            <label for="rating">Puntaje</label>
            <input name="rating" value="{{ old('rating') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
    <div class="form-group">
        <label for="favorite_movie_id">Pelicula Favorita</label>
        <select name="favorite_movie_id" class="form-control" style="width : 330px;">
            <option disabled selected value>Elija la pelicula</option>
            @foreach ($movies as $movie)
            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="d-flex md-form mt-0" style="margin-left : 65px">
        <a href="/actors" class="btn btn-primary btn-lg" role ="button" ><i class="fas fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-success" style="margin-left : 15px">Agregar actor</button>
    </div>
</form>
@endsection