@extends ('master')

@section('title')
{{$season->serie->title}} - {{$season->number}}
@endsection
@section('content')
<div style="margin-left : 30px">
    <div align="center" class="card" style="width: 18rem" >
        <div class="card-body">
            <h3 align="center" class="card-title">{{$season->serie->title}}</h3>
            <h4 align="center" class="card-title">{{$season->title}}</h4>

            <ul class="list-group list-group-flush">
                <li align="center" class="list-group-item"><b>Fecha De Estreno</b>
                    <h4>{{$season->fechaDeEstreno()}}</h4></li>
                <li align="center" class="list-group-item"><b>Fecha Del Final</b>
                    <h4>{{$season->fechaDeFinal()}}</h4></li>
                <li align="center" class="list-group-item"><h5><b>Episodios</b></h5>
                    @foreach ($season->episodes as $episode)
                    <h6><a href="../episodes/{{$episode->id}}">{{$episode->title}}</a></h6>
                    @endforeach 
                </li>
            </ul>
        </div>
    </div>
</div>
<hr align="left" width="350px">
<div class=" d-flex" style="margin-left : 80px">
    <a href="/series/{{$season->serie->id}}" class="btn btn-primary btn-lg" role ="button"><i class="fas fa-arrow-left"></i></a>
    <a href="/season/{{$season->id}}/edit" class="btn btn-success btn-lg" style="margin-left : 15px"><i class="fas fa-edit"></i></i></a>
    <form method="POST" action="{{$season->id}}">
        @method('DELETE')
        @csrf
        <button class = "btn btn-danger btn-lg" type="submit" value="BORRAR REGISTRO" style="margin-left : 15px"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@endsection
