<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAtividade;
use App\Models\Contratada;

class ControleController extends Controller
{
    public function carregarViewControle() {
        $lista_carimbos_controle = TipoAtividade::where('categoria', 'CONTROLE')->orderBy('categoria', 'asc')->get();
        
        return view('app.carimbos.controle', [
            'lista_carimbos_controle' => $lista_carimbos_controle,
            'title' => 'Controle'
        ]);
    }

    public function carregarFormCrise() {
        $lista_contratadas = Contratada::orderBy('nome')->get();
        return view('app.carimbos.forms.controle.escalonamento_crise', ['lista_contratadas' => $lista_contratadas,]);
    }

    public function insertCarimboCrise(Request $request) {
        
        $rules = [
            'numero_ta' => 'required|integer',
            'nome_eps' => 'required',
            'nome_control_desk_um_cire_atento' => 'required',
            'forma_contato_control_desk_um_cire_atento' => 'required',
            'nome_control_desk_dois_cire_atento' => 'required',
            'forma_contato_control_desk_dois_cire_atento' => 'required',
            'nome_supervisao_cire_atento' => 'required',
            'forma_contato_supervisao_cire_atento' => 'required',
            'nome_coordenacao_cire_atento' => 'required',
            'forma_contato_coordenacao_cire_atento' => 'required',
            'nome_gestao_cire_atento' => 'required',
            'forma_contato_gestao_cire_atento' => 'required',
            'forma_contato_gestao_cire_atento' => 'required',
            'nome_coordenacao_eps' => 'required',
            'horario_contato_coordenacao_eps' => 'required',
            'forma_contato_coordenacao_eps' => 'required',
            'nome_gerente_eps' => 'required',
            'horario_contato_gerente_eps' => 'required',
            'forma_contato_gerente_eps' => 'required',
            'nome_coordenacao_rede_externa' => 'required',
            'horario_contato_coordenacao_rede_externa' => 'required',
            'forma_contato_coordenacao_rede_externa' => 'required',
            'nome_gerente_secao_rede_externa' => 'required',
            'horario_contato_gerente_secao_rede_externa' => 'required',
            'forma_contato_gerente_secao_rede_externa' => 'required',
            'nome_gerente_divisao_rede_externa' => 'required',
            'horario_contato_gerente_divisao_rede_externa' => 'required',
            'forma_contato_gerente_divisao_rede_externa' => 'required',
            'nome_direcao_rede_externa' => 'required',
            'horario_contato_direcao_rede_externa' => 'required',
            'forma_contato_direcao_rede_externa' => 'required',
            'nome_gestao_cire_vivo' => 'required',
            'horario_contato_gestao_cire_vivo' => 'required',
            'forma_contato_gestao_cire_vivo' => 'required',
            'nome_coordenacao_cire_vivo' => 'required',
            'horario_contato_coordenacao_cire_vivo' => 'required',
            'forma_contato_coordenacao_cire_vivo' => 'required',
            'nome_gerente_cire_vivo' => 'required',
            'horario_contato_gerente_cire_vivo' => 'required',
            'forma_contato_gerente_cire_vivo' => 'required',
            'nome_gerente_divisao_cire_vivo' => 'required',
            'horario_contato_gerente_divisao_cire_vivo' => 'required',
            'forma_contato_gerente_divisao_cire_vivo' => 'required'
        ];

        $feedback = [
            'numero_ta.required' => 'Informar o TA.',
            'numero_ta.integer' => 'O TA deve possuir apenas números.',
            'nome_eps.required' => 'Informar a EPS.',
            'nome_control_desk_um_cire_atento.required' => 'Preencher o campo Control Desk (CIRE ATENTO).',
            'forma_contato_control_desk_um_cire_atento.required' => 'Informar o canal de contato com control desk (CIRE ATENTO)',
            'nome_control_desk_dois_cire_atento.required' => 'Preencher o campo Control Desk (CIRE ATENTO).',
            'forma_contato_control_desk_dois_cire_atento.required' => 'Informar o canal de contato com control desk (CIRE ATENTO)',
            'nome_supervisao_cire_atento.required' => 'Preencher o campo Supervisor(a) (CIRE ATENTO).',
            'forma_contato_supervisao_cire_atento.required' => 'Informar canal de contato com a supervisão (CIRE ATENTO).',
            'nome_coordenacao_cire_atento.required' => 'Preencher o campo Coordenador(a) (CIRE ATENTO).',
            'forma_contato_coordenacao_cire_atento.required' => 'Informar canal de contato com a coordenação (CIRE ATENTO).',
            'nome_gestao_cire_atento.required' => 'Preencher o campo Gestor(a) (CIRE ATENTO).',
            'forma_contato_gestao_cire_atento.required' => 'Informar canal de contato com a gestão (CIRE ATENTO).',
            'nome_coordenacao_eps.required' => 'Preencher o campo Coordenadora(a) (EPS).',
            'horario_contato_coordenacao_eps.required' => 'Informar o horário do contato com a coordenação (EPS)',
            'forma_contato_coordenacao_eps.required' => 'Informar canal de contato com a coordenação (EPS)',
            'nome_gerente_eps.required' => 'Preencher o campo Gerente (EPS).',
            'horario_contato_gerente_eps.required' => 'Informar o horário do contato com a gerência (EPS)',
            'forma_contato_gerente_eps.required' => 'Informar canal de contato com a gerência (EPS)',
            'nome_coordenacao_rede_externa.required' => 'Preencher o campo Coordenador(a) (REDE EXTERNA)',
            'horario_contato_coordenacao_rede_externa.required' => 'Informar o horário do contato com a coordenação (REDE EXTERNA)',
            'forma_contato_coordenacao_rede_externa.required' => 'Informar canal de contato com a coordenação (REDE EXTERNA)',
            'nome_gerente_secao_rede_externa.required' => 'Preencher o campo Gerente Seção (REDE EXTERNA)',
            'forma_contato_gerente_secao_rede_externa.required' => 'Informar o horário do contato com gerente seção (REDE EXTERNA)',
            'forma_contato_gerente_secao_rede_externa.required' => 'Informar canal de contato com gerente seção (REDE EXTERNA)',
            'nome_gerente_divisao_rede_externa.required' => 'Preencher o campo Gerente Divisão (REDE EXTERNA)',
            'horario_contato_gerente_divisao_rede_externa.required' => 'Informar o horário do contato com gerente divisão (REDE EXTERNA)',
            'forma_contato_gerente_divisao_rede_externa.required' => 'Informar canal de contato com gerente divisão (REDE EXTERNA)',
            'nome_direcao_rede_externa.required' => 'Preencher o campo Diretor(a) (REDE EXTERNA)',
            'horario.required' => 'Informar o horário do contato com a direção (REDE EXTERNA)',
            'forma_contato_direcao_rede_externa.required' => 'Informar canal de contato com a direção (REDE EXTERNA)',
            'nome_gestao_cire_vivo.required' => 'Preencher o campo Gestor(a) (CIRE VIVO)',
            'horario_contato_gestao_cire_vivo.required' => 'Informar o horário do contato com a gestão (CIRE VIVO)',
            'forma_contato_gestao_cire_vivo.required' => 'Informar canal de contato com a gestão (CIRE VIVO)',
            'nome_coordenacao_cire_vivo.required' => 'Preencher o campo Coordenador(a) (CIRE VIVO)',
            'horario_contato_coordenacao_cire_vivo.required' => 'Informar o horário do contato com a coordenação (CIRE VIVO)',
            'forma_contato_coordenacao_cire_vivo.required' => 'Informar canal de contato com a coordenação (CIRE VIVO)',
            'nome_gerente_cire_vivo.required' => 'Preencher o campo Gerente (CIRE VIVO)',
            'horario_contato_gerente_cire_vivo.required' => 'Informar o horário do contato com a gerência (CIRE VIVO)',
            'forma_contato_gerente_cire_vivo.required' => 'Informar canal de contato com a gerência (CIRE VIVO)',
            'nome_gerente_divisao_cire_vivo.required' => 'Preencher o campo Gerente Divisão (CIRE VIVO)',
            'horario_contato_gerente_divisao_cire_vivo.required' => 'Informar o horário do contato com gerente divisão (CIRE VIVO)',
            'forma_contato_gerente_divisao_cire_vivo.required' => 'Informar canal de contato com gerente divisão (CIRE VIVO)'
        ];
        
        echo json_encode(['msg' => 'Requisição feita com sucesso']);
    }
}
