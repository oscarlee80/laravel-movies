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
<h2 style= "margin-left : 100px">E P I S O D I O</h2>
<hr align="left" width="380px">
<div style= "width :380px">
<h2 align="center">{{$episode->season->serie->title}}</h2>
<h3 align="center">{{$episode->season->title}}</h3>
</div>
<hr align="left" width="380px">
<form method="POST" action="/episodes/{{$episode->id}}" style="margin-left:25px">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control"  style="width : 330px" placeholder="{{$episode->title}}">
    </div>
    <div class="form-group">
        <label for="number">Numero</label>
        <input name="number" value="{{ old('number') }}" type="text" class="form-control"  style="width : 330px" placeholder="{{$episode->number}}">
    </div>
    <div class="form-group">
        <label for="rating">Puntaje</label>
        <input name="rating" value="{{ old('rating') }}" type="text" class="form-control"  style="width : 330px" placeholder="{{$episode->rating}}">
    </div>
    <div class="form-group">
        <label for="release_date">Fecha de estreno</label>
        <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control" style="width : 330px;">
    </div>
    <br>
    <div class="d-flex md-form mt-0" style="margin-left : 45px">
        <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg" role ="button" ><i class="fas fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-success" style="margin-left : 15px">Guardar cambios</button>
    </div>
@endsection

