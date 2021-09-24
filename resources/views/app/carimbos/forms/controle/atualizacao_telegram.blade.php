<div id="form_controle_atualizacao_telegram" class="my-3">

    <b>Atualização Telegram</b>
    <form method="POST" id="form_atualizacao_telegram">
        @csrf

        <div class="form-inline">
            <input type="text" name="numero_ta" class="form-control" placeholder="Digite o TA" required>
            <button type="button" id="pesquisar_ta" class="btn btn-secondary ml-1">Pesquisar</button>
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
            <input class="form-check-input" type="checkbox" name="draco" value="possui_draco" id="possui_draco">
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
                <select name="to[]" id="lista_equipamentos_v1_to" class="form-control" size="8" multiple="multiple"></select>
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
                <select name="to[]" id="lista_equipamentos_v2_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
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
                <select name="to[]" id="lista_operadoras_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
        </div>

        <div class="form-inline">
            <input type="text" name="afetacao_voz" class="form-control mt-2 mr-1 col-md-2" placeholder="Voz">
            <input type="text" name="afetacao_speedy" class="form-control mt-2 mr-1 col-md-2" placeholder="Speedy">
            <input type="text" name="afetacao_clientes" class="form-control mt-2 mr-1 col-md-2" placeholder="Clientes">
            <i class="fas fa-question-circle" title='Caso haja afetação de Voz/Speedy/Clientes, digite a quantidade no campo correspondente.'></i>
        </div>

        <div class="form-group form-inline mt-2">
            <input type="text" name="lp" class="form-control mt-2 col-md-7" placeholder="LP">
            <i class="fas fa-question-circle ml-lg-1" title='Caso haja afetação de LP, digite o nome do cliente.'></i>
        </div>

        <div class="form-group row mt-2">
            <label class="col-form-label col-md-auto" for="horario_acionamento">Horário do Acionamento (EPS):</label>
            <input type="datetime-local" class="form-control mr-lg-1 col-lg-3" name="horario_acionamento" id="horario_acionamento" required>
        </div>

        <div class="form-group form-inline mt-2">
            <input type="text" name="ttmc" class="form-control mt-2 col-md-10" placeholder="TTMC">
            <i class="fas fa-question-circle ml-lg-1" title='Caso haja TTMC envolvido, descreva-o no campo ao lado.'></i>
        </div>

        <div class="mt-2">
            <label class="col-form-label">Status:</label>
            <textarea class="form-control col-md-10" rows="6" name="status" required></textarea>
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

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#lista_equipamentos_v1').multiselect();
        $('#lista_equipamentos_v2').multiselect();
        $('#lista_operadoras').multiselect();
    });

</script>
