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
        @if (Session::has('mensagem'))
            {{Session::get('mensagem')}}
        @endif
        <div>
            <b>Nome: </b>{{$user->nome}}
        </div>

        <div>
            <b>RE: </b>{{$user->id}}
        </div>

        <div>
            <b>Nível: </b>{{$user->nivel}}
        </div>

        <div class="my-1">
            <a type="button" href="{{route('usuarios.edit', ['user' => $user->id])}}" class="btn btn-info my-1"><i class="fas fa-edit"></i> Editar</a>
            <button type="button" class="btn btn-danger my-1" data-toggle="modal" data-target="#modalDeleteUsuario"><i class="fas fa-trash"></i> Remover</button>
        </div>
        <hr>
        <div>
            <h5>Últimas atividades</h5>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalDeleteUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o usuário de RE {{ $user->id }}?
                        <form id="form_deletar_usuario" method="post" action="{{route('usuarios.delete', ['user' => $user->id])}}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" form="form_deletar_usuario" id="confirmarDeleteUsuario">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('layouts.footer')

@endsection
