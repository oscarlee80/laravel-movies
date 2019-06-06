@extends('master')
@section('content')
<section>
    <ul>
        @foreach ($productos as $producto)
        <li><a href="/producto/{{ $producto['id'] }}">{{ $producto['nombre'] }}</a></li>
        @endforeach 
    </ul>
</section>
@endsection