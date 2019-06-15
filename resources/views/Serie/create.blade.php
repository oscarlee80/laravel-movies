@extends('master')
@section('content')
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert" style="width:330px; margin-left:25px">
        <li>{{ $error }}</li>
    </div>
    @endforeach
</ul>
@endif
<h2 style= "margin-left : 120px">N U E V A</h2>
<h2 style= "margin-left : 125px">S E R I E</h2>
<hr align="left" width="380px">
<form method="POST" action="/series/create" style="margin-left:25px">
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control"  style="width : 330px;">
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
        <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control" style="width : 330px;">
    </div>
    <div class="form-group">
            <label for="end_date">Fecha de culminación</label>
            <input type="date" name="end_date" value="{{ old("end_date") }}" class="form-control" style="width : 330px;">
        </div>
    <br>
    <div class="d-flex md-form mt-0" style="margin-left : 65px">
        <a href="/series" class="btn btn-primary btn-lg" role ="button" ><i class="fas fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-success" style="margin-left : 15px">Agregar serie</button>
    </div>
</form>
@endsection

