@extends ('master')

@section('title')
{{$actor->getNombreCompleto()}}
@endsection
@section('content')
<section>
    <h2>Nombre: {{$actor->getNombreCompleto()}}</h2>
    <h3>Puntaje: {{$actor->rating}}</h3>
</section>

<section>
        <a href="/actors" class="btn btn-info">VOLVER</a>
</section>
<section>
@endsection