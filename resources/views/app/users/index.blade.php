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
        <div id="link-cadastrar-usuario" class="mb-3">
            <a href="{{route('usuarios.create')}}">Cadastrar novo usuário</a>
        </div>
        <div id="btn-atualizar-lista-usuarios"><i class="fas fa-redo"></i></div>
        <small>*Clique no RE para visualizar o usuário</small>
        <table id="lista_usuarios" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>RE</th>
                    <th>Nome</th>
                    <th>Nível</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

</div>

@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('usuarios.listar') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            type: 'post',
            success: function(usuarios) {
                $('#lista_usuarios').DataTable({
                    data : usuarios.data, 
                    columns: [
                    {"data" : "id"},
                    {"data" : "nome"},
                    {"data" : "nivel"}            
                    ],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR)
            }
        })
    });
    /*
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('usuarios.listar') }}",
            data: {"_token": "{{ csrf_token() }}"},
            type: 'post',
            success: function(usuarios) {
                console.log(usuarios)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
            }
        })
        $('#lista_usuarios').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
            }
        });
    });

    $('#btn-atualizar-lista-usuarios').on('click', function(){
        alert('teste')
    });
    */

</script>

@endsection
