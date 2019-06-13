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