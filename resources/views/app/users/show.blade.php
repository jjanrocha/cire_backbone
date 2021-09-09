@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<div class="main" id="pagina">
    <div class="container">

        <div>
            <h4>Visulizar Usuário</h4>
            <hr>
        </div>
        <div class="mb-3">
            <a type="button" href="{{route('usuarios.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Lista de Usuários</a>
        </div>

        <div class="form-group row">
            <label class="col-md-1"><b>Nome:</b></label>
            <div class="col-md-10 ml-md-2">
                {{$usuario->nome}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-1"><b>RE:</b></label>
            <div class="col-md-10 ml-md-2">
                {{$usuario->id}}
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-info my-1"><i class="fas fa-edit"></i> Editar</button>
            <button type="button" class="btn btn-danger my-1"><i class="fas fa-trash"></i> Remover</button>
        </div>
        <hr>
        <div>
            <h5>Últimas atividades</h5>
        </div>

    </div>
</div>

@include('layouts.footer')
@endsection
