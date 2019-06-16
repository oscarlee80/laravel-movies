@extends ('master')

@section('title')
{{$serie->title}}
@endsection
@section('content')
<div style="margin-left : 30px">
    <div align="center" class="card" style="width: 285px" >
        <div class="card-body">
            <h3 align="center" class="card-title">{{$serie->title}}</h3>
            <ul class="list-group list-group-flush">
                <li align="center" class="list-group-item"><b>Fecha De Estreno</b>
                    <h4>{{$serie->fechaDeEstreno()}}</h4></li>
                <li align="center" class="list-group-item"><b>Fecha Del Final</b>
                    <h4>{{$serie->fechaDeFinal()}}</h4></li>
                @if (!empty($serie->genre))
                <li align="center" class="list-group-item"><b>Genero</b>
                    <a href="/genres/{{$serie->genre->id}}"><h5>{{$serie->genre->name}}</h5></li></a>
                @endif
                @if (count($serie->seasons) > 0)
                <li align="center" class="list-group-item"><b>Temporadas</b>
                    @foreach ($serie->seasons as $season)
                    <h6><a href="/seasons/{{$season->id}}">{{$season->title}}</a></h6>
                    @endforeach
                @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<hr align="left" width="350px">
@if (count($serie->seasons) == 0) 
<div class=" d-flex" style="margin-left : 45px">
    <a href="/series" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/seasons/create" class="btn btn-success btn-lg " style="margin-left : 15px"><i class="fas fa-plus-square"></i></a>
    <a href="/series/{{$serie->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    <form method="POST" action="{{$serie->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@else
<div class=" d-flex" style="margin-left : 75px">
    <a href="/series" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/seasons/create" class="btn btn-success btn-lg " style="margin-left : 15px"><i class="fas fa-plus-square"></i></a>
    <a href="/series/{{$serie->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
</div>
@endif
@endsection
