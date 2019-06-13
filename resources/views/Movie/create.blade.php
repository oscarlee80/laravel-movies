@extends('master')
@section('content')
<section>
    <article>
        <h1>Agregando nueva pelicula</h1>
    </article>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                    <li>{{ $error }}</li>
            </div>
            @endforeach
        </ul>
    @endif
    <article>
        <form method="POST" action="/movies/create">
            @csrf
            <div>
                <label for="title">Titulo</label>
                <input type="text" name="title" value="{{ old('title') }}"/>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" name="rating" value="{{ old('rating') }}" />
            </div>
            <div>
                <label for="awards">Premios</label>
                <input type="text" name="awards" value="{{ old('awards') }}" />
            </div>
            <div>
                <label for="length">Duracion</label>
                <input type="text" name="length" value="{{ old('length') }}" />
            </div>
            <div>
                <label>Genero</label>
                <select name="genre">
                    <option value="{{ old('genre') }}">Genero</option>
                    
                    <option value=""></option>
                    
                </select>
            <div>
                <label>Fecha de Estreno</label>
                <select name="dia">
                    <option value="{{ old('dia') }}">Dia</option>
                    <?php for ($i=1; $i < 32; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="mes">
                    <option value="{{ old('mes') }}">Mes</option>
                    <?php for ($i=1; $i < 13; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="anio">
                    <option value="{{ old('anio') }}">Anio</option>
                    <?php for ($i=1970; $i < 2019; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="Agregar Pelicula" name="submit" />
        </form>
    </article>
</section>
<br>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>

@endsection

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
<h2 style= "margin-left : 100px">P E L I C U L A</h2>
<hr align="left" width="380px">
<form method="POST" action="/actors/create" style="margin-left:25px">
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control"  style="width : 330px;">
    </div>
    <div class="form-group">
        <label for="rating">Puntaje</label>
        <input name="rating" value="{{ old('rating') }}" type="text" class="form-control"  style="width : 330px;">
    </div>
    <div class="form-group">
            <label for="awards">Premios</label>
            <input name="awards" value="{{ old('awards') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
    <div class="form-group">
        <label for="genre_id">Género</label>
        <select name="genre_id" class="form-control" style="width : 330px;">
            <option disabled selected value>Elija el genero</option>
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