@extends ('master')

@section('title')
{{$genre}}
@endsection

@section('content')
<section>
    <h2>{{$genre}}</h2>
</section>
<section>
        <a href="/genres">VOLVER</a>
    </section>
@endsection