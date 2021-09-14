@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">
    <div class="container">


        <div>
            <h4>Controle</h4>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo_atividade_id" id="controle_crise" value="controle_crise">
                    <label class="form-check-label" for="controle_crise">
                        ESCALONAMENTO CRISE
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo_atividade_id" id="controle_urgente" value="controle_urgente">
                    <label class="form-check-label" for="controle_urgente">
                        ESCALONAMENTO URGENTE
                    </label>
                </div>
            </div>
        </div>

        <div id="conteudo">
        </div>

    </div>
</div>
@include('layouts.footer')

<script>
    $(document).ready(function() {
        $(document).on('click', "input:radio[name ='tipo_atividade_id']", function() {
            var tipo_carimbo = $("input:radio[name ='tipo_atividade_id']:checked").val()
            $.ajax({
                type: 'POST',
                data: {"_token": "{{ csrf_token() }}"},
                url: '{{url("carimbos/controle/formularios")}}' + '/' + tipo_carimbo,
                success: function(data) {
                    $("#conteudo").html(data);
                },
                error: function(xhr, textStatus, errorThrown) {
                    $("#conteudo").html('Falha ao tentar carregar o formulário. Caso o erro persista, favor contatar o suporte.');
                }
            });
        });
    });

    $(document).on('click', '#btnEnviar', function() {
        alert('teste');
    });

</script>
@endsection
