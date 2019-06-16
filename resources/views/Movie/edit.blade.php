@extends('master')
@section('content')
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert" style="width:330px; margin-left:-15px">
        <li>{{ $error }}</li>
    </div>
    @endforeach
</ul>
@endif
<h2 style= "margin-left : 120px">E D I T A R</h2>
<h2 style= "margin-left : 100px">P E L I C U L A</h2>
<hr align="left" width="380px">
<form method="POST" action="/movies/{{$movie->id}}" style="margin-left:25px">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title">Título</label>
    <input name="title" value="{{ old('title') }}" type="text" class="form-control"  style="width : 330px;" placeholder="{{ $movie->title}}">
    </div>
    <div class="form-group">
        <label for="rating">Puntaje</label>
        <input name="rating" value="{{ old('rating') }}" type="text" class="form-control"  style="width : 330px;" placeholder="{{ $movie->rating}}">
    </div>
    <div class="form-group">
        <label for="awards">Premios</label>
        <input name="awards" value="{{ old('awards') }}" type="text" class="form-control"  style="width : 330px;" placeholder="{{ $movie->awards}}">
    </div>
    <div class="form-group">
        <label for="length">Duración</label>
        <input name="length" value="{{ old('length') }}" type="text" class="form-control"  style="width : 330px;" placeholder="{{ $movie->length}}">
    </div>
    <div class="form-group">
        <label for="genre_id">Género</label>
        <select name="genre_id" class="form-control" style="width : 330px;">
            <option disabled selected value>Elija el genero</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="release_date">Fecha de estreno</label>
        <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control" style="width : 330px;" placeholder="{{ $movie->release_date}}">
    </div>
    <br>
    <div class="d-flex md-form mt-0" style="margin-left : 55px">
        <a href="/movies" class="btn btn-primary btn-lg" role ="button" ><i class="fas fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-success" style="margin-left : 15px">Guardar cambios</button>
    </div>
</form>
@endsection

