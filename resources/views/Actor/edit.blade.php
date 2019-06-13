@extends ('master')

@section('title')
Edit - {{$actor->getNombreCompleto()}}
@endsection
@section('content')
<h1>Modificar Datos</h1>
<article>
    <form method="POST" action="/actors/{{$actor->id}}">
        @method('PUT')
        @csrf
        <div>
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="{{$actor->first_name}}"/>
        </div>
        <div>
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="{{$actor->last_name}}" />
        </div>
        <div>
            <label for="rating">Puntaje</label>
            <input type="text" name="rating" value="{{ old('rating') }}" placeholder="{{$actor->rating}}" />
        </div>
        <hr>
        <input class="btn btn-info" type="submit" value="Modificar Datos" />
    </form>
</article>
<hr>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>
<section>
@endsection