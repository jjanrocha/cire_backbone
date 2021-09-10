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
                @foreach ( $lista_carimbos_controle as $option )
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo_carimbo_id" id="{{$option['tipo_carimbo']}}" value="{{ $option['id'] }}">
                    <label class="form-check-label" for="{{$option['tipo_carimbo']}}">
                        {{ $option['tipo_carimbo'] }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>


        <div id="form_controle_escalonamento_crise_" class="my-3">
            <div>
                <h6>Escalonamento CRISE</h6>
            </div>
            <form method="POST" action="#">
                <div class="my-2">
                    <b>CIRE ATENTO</b>
                    <br>
                    <div class="form-group row">
                        <label for="nome_control_desk_um_cire_atento" class="col-form-label col-lg-2">Control Desk:</label>
                        <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_control_desk_um_cire_atento" id="nome_control_desk_um_cire_atento" placeholder="Control Desk (CIRE ATENTO)" required>
                        <select class="custom-select col-lg-2" name="forma_contato_control_desk_um_cire_atento" required>
                            <option selected>Canal</option>
                            <option value="via caixa postal">Caixa postal</option>
                            <option value="via fone">Fone</option>
                            <option value="via telegram">Telegram</option>
                            <option value="não possui caixa postal">Sem caixa postal</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome_control_desk_dois_cire_atento" class="col-form-label col-lg-2">Control Desk:</label>
                        <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_control_desk_dois_cire_atento" id="nome_control_desk_dois_cire_atento" placeholder="Control Desk (CIRE ATENTO)" required>
                        <select class="custom-select col-lg-2" name="forma_contato_control_desk_dois_cire_atento" required>
                            <option selected>Canal</option>
                            <option value="via caixa postal">Caixa postal</option>
                            <option value="via fone">Fone</option>
                            <option value="via telegram">Telegram</option>
                            <option value="não possui caixa postal">Sem caixa postal</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome_supervisao_cire_atento" class="col-form-label col-lg-2">Supervisor(a):</label>
                        <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_supervisao_cire_atento" id="nome_supervisao_cire_atento" placeholder="Supervisor(a) (CIRE ATENTO)">
                        <select class="custom-select col-lg-2" name="forma_contato_supervisao_cire_atento" required>
                            <option selected>Canal</option>
                            <option value="via caixa postal">Caixa postal</option>
                            <option value="via fone">Fone</option>
                            <option value="via telegram">Telegram</option>
                            <option value="não possui caixa postal">Sem caixa postal</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome_coordenacao_cire_atento" class="col-form-label col-lg-2">Coordenador(a):</label>
                        <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_coordenacao_cire_atento" id="nome_coordenacao_cire_atento" placeholder="Coordenador(a) (CIRE ATENTO)" required>
                        <select class="custom-select col-lg-2" name="forma_contato_coordenacao_cire_atento" required>
                            <option selected>Canal</option>
                            <option value="via caixa postal">Caixa postal</option>
                            <option value="via fone">Fone</option>
                            <option value="via telegram">Telegram</option>
                            <option value="não possui caixa postal">Sem caixa postal</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome_gestao_cire_atento" class="col-form-label col-lg-2">Gestor(a):</label>
                        <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_gestao_cire_atento" id="nome_gestao_cire_atento" placeholder="Gestor(a) (CIRE ATENTO)">
                        <select class="custom-select col-lg-2" name="forma_contato_gestao_cire_atento" required>
                            <option selected>Canal</option>
                            <option value="via caixa postal">Caixa postal</option>
                            <option value="via fone">Fone</option>
                            <option value="via telegram">Telegram</option>
                            <option value="não possui caixa postal">Sem caixa postal</option>
                        </select>
                    </div>
                    <div class="my-2">
                        <b>EPS:</b>
                        <br>
                        <div class="form-group row">
                            <label for="nome_coordenacao_eps" class="col-form-label col-lg-2">Coordenador(a):</label>
                            <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_coordenacao_eps" id="nome_coordenacao_eps" placeholder="Coordenador(a) (EPS)" required>
                            <select class="custom-select col-lg-2" name="forma_contato_coordenador_eps" required>
                                <option selected>Canal</option>
                                <option value="via caixa postal">Caixa postal</option>
                                <option value="via fone">Fone</option>
                                <option value="via telegram">Telegram</option>
                                <option value="não possui caixa postal">Sem caixa postal</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="nome_gerente_eps" class="col-form-label col-lg-2">Gerente:</label>
                            <input type="text" class="form-control mr-lg-1 col-lg-5" name="nome_gerente_eps" id="nome_gerente_eps" placeholder="Gerente (EPS)" required>
                            <select class="custom-select col-lg-2" name="forma_contato_gerente_eps" required>
                                <option selected>Canal</option>
                                <option value="via caixa postal">Caixa postal</option>
                                <option value="via fone">Fone</option>
                                <option value="via telegram">Telegram</option>
                                <option value="não possui caixa postal">Sem caixa postal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@include('layouts.footer')
@endsection
