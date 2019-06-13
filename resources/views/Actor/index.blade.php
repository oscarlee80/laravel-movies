@extends ('master')
@section('title')
Actors
@endsection
@section('content')
<section>
    <ul>
        @forelse ($actors as $actor)
        <li>{{$actor['name']}}</li>
        @endforeach
    </ul>
</section>
<section>
    <a href="#" onclick="history.back();" class="btn btn-info">VOLVER</a>
</section>
@endsection