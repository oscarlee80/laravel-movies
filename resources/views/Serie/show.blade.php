@extends ('master')

@section('title')
{{$serie->title}}
@endsection
@section('content')
<div style="margin-left : 30px">
    <div align="center" class="card" style="width: 18rem" >
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
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 80px">
    <a href="/series" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/series/{{$serie->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    <form method="POST" action="{{$serie->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@endsection
