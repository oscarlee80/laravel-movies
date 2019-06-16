@extends ('master')

@section('title')
{{$episode->season->serie->title}} - {{$episode->season->number}} - {{$episode->number}} 
@endsection
@section('content')
<div style="margin-left : 30px">
    <div align="center" class="card" style="width: 18rem" >
        <div class="card-body">
            <h4 align="center" class="card-title">{{$episode->season->serie->title}}</h4>
            <h5 align="center" class="card-title">{{$episode->season->title}}</h5>
            <h3 align="center" class="card-title">{{$episode->title}}</h3>
            <ul class="list-group list-group-flush">
                <li align="center" class="list-group-item"><b>Numero</b>
                    <h4>{{$episode->number}}</h4></li>
                <li align="center" class="list-group-item"><b>Rating</b>
                    <h4>{{$episode->rating}}</h4></li>
                <li align="center" class="list-group-item"><b>Fecha De Estreno</b>
                    <h4>{{$episode->fechaDeEstreno()}}</h4></li>
            </ul>
        </div>
    </div>
</div>
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 80px">
    <a href="/seasons/{{$episode->season->id}}" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/episodes/{{$episode->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    <form method="POST" action="{{$episode->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@endsection
