<div id="form_controle_atualizacao_telegram" class="my-3">

    <b>Atualização Telegram</b>
    <form method="POST" id="form_atualizacao_telegram">
        @csrf

        <div class="form-inline">
            <input type="text" name="numero_ta" class="form-control" placeholder="Digite o TA" required>
            <button type="button" id="pesquisar_ta" class="btn btn-secondary ml-1">Carregar</button>
        </div>

        <div class="form-inline">
        <select class="custom-select my-1 mr-sm-2" name="tipo_bilhete" required>
            <option value="" disabled selected>Tipo de Bilhete</option>
            <option value="NACIONAL VIVO 1">NACIONAL V1</option>
            <option value="NACIONAL VIVO 2">NACIONAL V2</option>
            <option value="REGIONAL VIVO 1">REGIONAL V1</option>
            <option value="REGIONAL VIVO 2">REGIONAL V2</option>
        </select>
        </div>

        <div class="form-inline row mt-1">
            <label class="col-form-label col-md-1">Rota:</label>
            <input type="text" class="form-control mr-lg-1 col-lg-3" name="rota_ponta_a" placeholder="Ponta A" required>
            <label class="col-form-label col-md-auto">X</label>
            <input type="text" class="form-control mr-lg-1 col-lg-3" name="rota_ponta_b" placeholder="Ponta B">
            <i class="fas fa-question-circle" title='Caso possua apenas uma informação, digite no campo "Ponta A" e deixe o campo "Ponta B" vazio.'></i>
        </div>

        <div class="form-inline row mt-1">
            <label class="col-form-label col-md-1">Trecho:</label>
            <input type="text" class="form-control mr-lg-1 col-lg-3" name="trecho_ponta_a" placeholder="Ponta A" required>
            <label class="col-form-label col-md-auto">X</label>
            <input type="text" class="form-control mr-lg-1 col-lg-3" name="trecho_ponta_b" placeholder="Ponta B">
            <i class="fas fa-question-circle" title='Caso possua apenas uma informação, digite no campo "Ponta A" e deixe o campo "Ponta B" vazio.'></i>
        </div>

        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="possui_draco" value="sim" id="possui_draco">
            <label class="form-check-label" for="possui_draco">
                Possui DRACO afetado
            </label>
            <i class="fas fa-question-circle" title='Caso haja afetação de DRACO, marque a caixinha.'></i>
        </div>

        <br>
        Equipamento(s) V1: <i class="fas fa-question-circle" title='Caso haja afetação de equipamento Vivo 1, mova-o para a direita.'></i>
        <div class="row">
            <div class="col-md-4">
                <select name="lista_equipamentos_v1[]" id="lista_equipamentos_v1" class="form-control" size="8" multiple="multiple">
                    @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->fabricante}}">{{$equipamento->fabricante}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="lista_equipamentos_v1_rightAll" class="btn btn-block"><i class="fas fa-angle-double-right"></i></button>
                <button type="button" id="lista_equipamentos_v1_rightSelected" class="btn btn-block"><i class="fas fa-angle-right"></i></button>
                <button type="button" id="lista_equipamentos_v1_leftSelected" class="btn btn-block"><i class="fas fa-angle-left"></i></button>
                <button type="button" id="lista_equipamentos_v1_leftAll" class="btn btn-block"><i class="fas fa-angle-double-left"></i></button>
            </div>
            <div class="col-md-4">
                <select name="lista_equipamentos_v1_to[]" id="lista_equipamentos_v1_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
        </div>

        <br>
        Equipamento(s) V2: <i class="fas fa-question-circle" title='Caso haja afetação de equipamento Vivo 2, mova-o para a direita.'></i>
        <div class="row">
            <div class="col-md-4">
                <select name="lista_equipamentos_v2[]" id="lista_equipamentos_v2" class="form-control" size="8" multiple="multiple">
                    @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->fabricante}}">{{$equipamento->fabricante}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="lista_equipamentos_v2_rightAll" class="btn btn-block"><i class="fas fa-angle-double-right"></i></button>
                <button type="button" id="lista_equipamentos_v2_rightSelected" class="btn btn-block"><i class="fas fa-angle-right"></i></button>
                <button type="button" id="lista_equipamentos_v2_leftSelected" class="btn btn-block"><i class="fas fa-angle-left"></i></button>
                <button type="button" id="lista_equipamentos_v2_leftAll" class="btn btn-block"><i class="fas fa-angle-double-left"></i></button>
            </div>
            <div class="col-md-4">
                <select name="lista_equipamentos_v2_to[]" id="lista_equipamentos_v2_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-form-label col-md-auto">Redundância(s) V2:</label>
            <input type="text" class="form-control mr-lg-1 col-lg-3" name="redundancias_v2" placeholder="Digite a quantidade">
        </div>

        <br>
        Operadora(s): <i class="fas fa-question-circle" title='Caso haja afetação de equipamento Vivo 2, mova-a para a direita.'></i>
        <div class="row">
            <div class="col-md-4">
                <select name="lista_operadoras[]" id="lista_operadoras" class="form-control" size="8" multiple="multiple">
                    @foreach($operadoras as $operadora)
                    <option value="{{$operadora->nome}}">{{$operadora->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="lista_operadoras_rightAll" class="btn btn-block"><i class="fas fa-angle-double-right"></i></button>
                <button type="button" id="lista_operadoras_rightSelected" class="btn btn-block"><i class="fas fa-angle-right"></i></button>
                <button type="button" id="lista_operadoras_leftSelected" class="btn btn-block"><i class="fas fa-angle-left"></i></button>
                <button type="button" id="lista_operadoras_leftAll" class="btn btn-block"><i class="fas fa-angle-double-left"></i></button>
            </div>
            <div class="col-md-4">
                <select name="lista_operadoras_to[]" id="lista_operadoras_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
        </div>

        <div class="form-inline">
            <input type="text" name="afetacao_erbs" class="form-control mt-2 mr-1 col-md-2" placeholder="ERB">
            <input type="text" name="afetacao_voz" class="form-control mt-2 mr-1 col-md-2" placeholder="Voz">
            <input type="text" name="afetacao_speedy" class="form-control mt-2 mr-1 col-md-2" placeholder="Speedy">
            <input type="text" name="afetacao_clientes" class="form-control mt-2 mr-1 col-md-2" placeholder="Clientes">
            <input type="text" name="afetacao_fttx" class="form-control mt-2 mr-1 col-md-2" placeholder="FTTx">
            <input type="text" name="afetacao_iptv" class="form-control mt-2 mr-1 col-md-2" placeholder="IPTV">
        </div>

        <div class="form-group form-inline mt-2">
            <input type="text" name="lp" class="form-control mt-2 col-md-7" placeholder="LP">
            <i class="fas fa-question-circle ml-lg-1" title='Caso haja afetação de LP, digite o nome do cliente.'></i>
        </div>

        <div class="form-group row mt-2">
            <label class="col-form-label col-md-auto" for="horario_acionamento">Horário do Acionamento (EPS):</label>
            <input type="datetime-local" class="form-control mr-lg-1 col-lg-3" name="horario_acionamento" id="horario_acionamento" required>
        </div>

        <div class="form-group row mt-2">
            <label class="col-form-label col-md-auto">TTMC:</label>
            <input type="text" class="form-control mr-lg-1 col-lg-2" name="ttmc_numero" id="ttmc_numero" placeholder="Número">
            <select class="form-control mr-lg-1 col-lg-3" name="ttmc_tipo" id="ttmc_tipo">
                <option value="" selected disabled>Tipo</option>
                <option value="Backbone Nacional">Backbone Nacional</option>
                <option value="Backbone Regional">Backbone Regional</option>
            </select>
            <select class="form-control col-lg-3" name="ttmc_rede" id="ttmc_rede">
                <option value="" selected disabled>Rede</option>
                <option value="Rede Móvel">Rede Móvel</option>
                <option value="Rede Fixa">Rede Fixa</option>
            </select>
        </div>

        <div class="mt-2">
            <div class="form-group row">
                <label class="col-form-label col-md-auto">Status:</label>
                <select class="custom-select col-lg-5" name="tipo_status" id="tipo_status" required>
                    <option value="" disabled selected>Tipo de Status</option>
                    <option value="agendamento">Agendamento</option>
                    <option value="em_deslocamento">Em deslocamento para medições</option>
                    <option value="percorrendo_rota_localizar_falha">Percorrendo rota para localizar falha</option>
                    <option value="percorrendo_rota_retirar_atenuacao">Percorrendo rota para retirar atenuações</option>
                    <option value="recuperando_falha">Recuperando falha</option>
                    <option value="testes">Testes</option>
                    <option value="tramitacao_outra_area">Tramitação (outra área)</option>
                    <option value="tramitacao_area_vivo">Tramitação (área Vivo)</option>
                </select>
            </div>
            <textarea class="form-control col-md-10" rows="8" name="status" id="status" required>STATUS: </textarea>
        </div>

        <div class="form-group row mt-2">
            <label class="col-form-label col-md-auto">Escalonamento:</label>
            <input type="text" class="form-control mr-lg-1 col-lg-5" name="escalonamento" required>
        </div>

        <button type="submit" id="btnEnviar" class="btn btn-success my-1">Gerar Carimbo</button>
        <button type="reset" id="btnReset" class="btn btn-danger my-1">Limpar</button>

    </form>

</div>

<script type="text/javascript" src="{{asset('js/multiselect.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#ttmc_numero').mask('0.000/0000');
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#lista_equipamentos_v1').multiselect();
        $('#lista_equipamentos_v2').multiselect();
        $('#lista_operadoras').multiselect();
    });
</script>

<script type="text/javascript">
    $(document).on('submit', '#form_atualizacao_telegram', function(event) {
        event.preventDefault()
        var dados = $(this).serialize()

        $.ajax({
            type: 'POST',
            data: dados,
            url: '{{route('insert.controle_atualizacao_telegram')}}',
            beforeSend: function() {
                $("#btnEnviar").hide();
            },
            success: function(response) {
                $('input[name=tipo_atividade_id]').prop('checked', false);
                var textarea_carimbo = document.createElement("TEXTAREA");
                textarea_carimbo.className = "form-control col-md-8 mt-1";
                textarea_carimbo.rows = 27;
                textarea_carimbo.readOnly = true;
                textarea_carimbo.innerHTML = (
                    response.informacoes_basicas +
                    response.rota +
                    response.trecho_localidade +
                    "AFETAÇÃO:" +
                    response.afetacao +
                    "ACIONAMENTO: " +
                    response.horario_acionamento +
                    response.ttmc +
                    response.status +
                    response.escalonamento +
                    response.analista_cire
                );
                $("#conteudo").html(textarea_carimbo);
            },
            error: function(xhr) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                    alert(value)
                });
            },
        });

    });
</script>