@extends('master')
@section('content')

<section>
    <article>
        <h1>Agregando nuevo actor</h1>
    </article>
    @if (isset($error))
        <div class="alert alert-danger" role="alert">
            Ese actor ya está registrado
        </div>
    @endif
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
        <form method="POST" action="/actors/store">
            @csrf
            <div>
                <label for="first_name">Nombre</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}"/>
            </div>
            <div>
                <label for="last_name">Apellido</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" />
            </div>
            <div>
                <label for="rating">Puntaje</label>
                <input type="text" name="rating" value="{{ old('rating') }}" />
            </div>
            <input type="submit" value="Agregar Actor" name="submit" />
        </form>
    </article>
</section>
<br>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>

@endsection