@extends('layouts.basico')
@section('title', 'CIRE Backbone - Usuários')

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">

    <div class="container">

        <div id="users-header">
            <h4>Administração de Usuários</h4>
            <hr>
        </div>
        <div id="btn-cadastrar-usuario" class="mb-3">
            <a type="button" href="{{route('usuarios.create')}}" class="btn btn-secondary">Cadastrar novo usuário</a>
        </div>
        <p>*Clique no RE para visualizar o usuário</p>
        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>RE</th>
                    <th>Nome</th>
                    <th>Nível</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nome}}</td>
                    <td>{{$usuario->nivel}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

@include('layouts.footer')
<script>
    $(document).ready(function() {
        $('#usuarios').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
            }
        });
    });
</script>

@endsection
