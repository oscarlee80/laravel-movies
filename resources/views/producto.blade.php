@extends('master')
@section('title')
{{ $producto['nombre'] }} | Alpargatas
@endsection
@section('content')
<section>
    <h1>{{ $producto['nombre'] }}</h1>
    <p>$ {{ $producto['precio'] }}</p>
    <img src="https://static.kiabi.es/images/alpargatas-de-tela-null-hombre-vn740_3_zc1.jpg" alt="">
</section>
<section>
    <a href="/catalogo">VOLVER</a>
</section>
@endsection