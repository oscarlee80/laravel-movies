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
    <h2 style= "margin-left : 120px">N U E V O</h2>
    <h2 style= "margin-left : 110px">G E N E R O</h2>
    <hr align="left" width="380px">
    <form method="POST" action="/genres/create" style="margin-left:25px">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="ranking">Ranking</label>
            <input name="ranking" value="{{ old('ranking') }}" type="text" class="form-control"  style="width : 330px;">
        </div>        
        <label for="active">Activo?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value=1 checked>
            <label class="form-check-label" for="exampleRadios1">Si</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value=0>
            <label class="form-check-label" for="exampleRadios2">No</label>
        </div>
        <br>
        <div class="d-flex md-form mt-0" style="margin-left : 65px">
            <a href="/actors" class="btn btn-primary btn-lg" role ="button" ><i class="fas fa-arrow-left"></i></a>
            <button type="submit" class="btn btn-success" style="margin-left : 15px">Agregar genero</button>
        </div>
    </form>
@endsection





