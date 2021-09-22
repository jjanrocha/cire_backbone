<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;
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

    public function carregarFormUrgente() {
        $lista_contratadas = Contratada::orderBy('nome')->get();
        return view('app.carimbos.forms.controle.escalonamento_urgente', ['lista_contratadas' => $lista_contratadas,]);
    }

    public function carregarFormAtualizacaoTelegram() {
        return view('app.carimbos.forms.controle.atualizacao_telegram');
    }

    public function insertCarimboCrise(Request $request) {

        $nome_usuario = auth()->user()->nome;
        
        //Regras de validação dos campos do form
        $rules = [
            'numero_ta' => 'required|integer',
            'nome_eps' => 'required',
            'tipo_carimbo' => 'required',
            'nome_control_desk_um_cire_atento' => 'required',
            'forma_contato_control_desk_um_cire_atento' => 'required',
            //'nome_control_desk_dois_cire_atento' => 'required',
            //'forma_contato_control_desk_dois_cire_atento' => 'required',
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

        //Mensagens de retorno em caso de erro
        $feedback = [
            'numero_ta.required' => 'Informar o TA.',
            'numero_ta.integer' => 'O TA deve possuir apenas números.',
            'nome_eps.required' => 'Informar a EPS.',
            'tipo_carimbo.required' => 'Informar a o tipo de carimbo CRISE.',
            'nome_control_desk_um_cire_atento.required' => 'Preencher o campo Control Desk (CIRE ATENTO).',
            'forma_contato_control_desk_um_cire_atento.required' => 'Informar o canal de contato com control desk (CIRE ATENTO)',
            //'nome_control_desk_dois_cire_atento.required' => 'Preencher o campo Control Desk (CIRE ATENTO).',
            //'forma_contato_control_desk_dois_cire_atento.required' => 'Informar o canal de contato com control desk (CIRE ATENTO)',
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

        //Validação dos campos do form
        $request->validate($rules, $feedback);
        
        //Instância do model atividade
        $atividade = new Atividade();

        //Criação do carimbo para insert no banco e retorno ao usuário.
        $response['carimbo'] = "xxxxxxxxxxxxxxx Escalonamento CRISE $request->tipo_carimbo xxxxxxxxxxxxxx\n----------------------------------------------------\nCIRE ATENTO\nControl Desk: $request->nome_control_desk_um_cire_atento $request->forma_contato_control_desk_um_cire_atento\nSupervisor(a): $request->nome_supervisao_cire_atento $request->forma_contato_supervisao_cire_atento\nCoordenador(a): $request->nome_coordenacao_cire_atento $request->forma_contato_coordenacao_cire_atento\nGestor(a): $request->nome_gestao_cire_atento $request->forma_contato_gestao_cire_atento\n----------------------------------------------------\nEPS ($request->nome_eps)\nCoordenador(a): $request->nome_coordenacao_eps $request->horario_contato_coordenacao_eps $request->forma_contato_coordenacao_eps\nGerente: $request->nome_gerente_eps $request->horario_contato_gerente_eps $request->forma_contato_gerente_eps\n----------------------------------------------------\nREDE EXTERNA\nCoordenador(a): $request->nome_coordenacao_rede_externa $request->horario_contato_coordenacao_rede_externa $request->forma_contato_coordenacao_rede_externa\nGerente Seção: $request->nome_gerente_secao_rede_externa $request->horario_contato_gerente_secao_rede_externa $request->forma_contato_gerente_secao_rede_externa\nGerente Divisão: $request->nome_gerente_divisao_rede_externa $request->horario_contato_gerente_divisao_rede_externa $request->forma_contato_gerente_divisao_rede_externa\nDiretora(a): $request->nome_direcao_rede_externa $request->horario_contato_direcao_rede_externa $request->forma_contato_direcao_rede_externa\n----------------------------------------------------\nCIRE VIVO\nGestor(a): $request->nome_gestao_cire_vivo $request->horario_contato_gestao_cire_vivo $request->forma_contato_gestao_cire_vivo\nCoordenador(a): $request->nome_coordenacao_cire_vivo $request->horario_contato_coordenacao_cire_vivo $request->forma_contato_coordenacao_cire_vivo\nGerente: $request->nome_gerente_cire_vivo $request->horario_contato_gerente_cire_vivo $request->forma_contato_gerente_cire_vivo\nGerente Divisão: $request->nome_gerente_divisao_cire_vivo $request->horario_contato_gerente_divisao_cire_vivo $request->forma_contato_gerente_divisao_cire_vivo\n----------------------------------------------------\nAnalista Cire: $nome_usuario\nxxxxxxxxxxxxxxx Escalonamento CRISE $request->tipo_carimbo xxxxxxxxxxxxxx";

        $response['mensagem'] = "Carimbo gerado com sucesso.";

        //Atribuindo os valores
        $atividade->usuario_id = Auth::user()->id;
        $atividade->data_hora = date("Y-m-d H:i:s");
        $atividade->numero_ta = $request->numero_ta;
        $atividade->tipo_atividade_id = 1;
        $atividade->carimbo = $response['carimbo'];
        $atividade->save();

        return response()->json($response);
    }


    public function insertCarimboUrgente(Request $request) {

    $nome_usuario = auth()->user()->nome;
    
    //Regras de validação dos campos do form
    $rules = [
        'numero_ta' => 'required|integer',
        'nome_eps' => 'required',
        'escalonamento_horas' => 'required'
    ];

    //Mensagens de retorno em caso de erro
    $feedback = [
        'numero_ta.required' => 'Informar o TA.',
        'numero_ta.integer' => 'O TA deve possuir apenas números.'
    ];

    //Validação dos campos do form
    $request->validate($rules, $feedback);
    
    //Instância do model atividade
    $atividade = new Atividade();

    //Criação do carimbo para insert no banco e retorno ao usuário.
    $response['carimbo'] = "xxxxxxxxxxxxxxx Escalonamento $request->escalonamento_horas horas xxxxxxxxxxxxxx\n----------------------------------------------------\nVIVO REDE\nN1: $request->n1_vivo_rede $request->horario_contato_n1_vivo_rede $request->forma_contato_n1_vivo_rede\nN2: $request->n2_vivo_rede $request->horario_contato_n2_vivo_rede $request->forma_contato_n2_vivo_rede \nN3: $request->n3_vivo_rede $request->horario_contato_n3_vivo_rede $request->forma_contato_n3_vivo_rede \nN4: $request->n4_vivo_rede $request->horario_contato_n4_vivo_rede $request->forma_contato_n4_vivo_rede \nN5: $request->n5_vivo_rede $request->horario_contato_n5_vivo_rede $request->forma_contato_n5_vivo_rede \n----------------------------------------------------\nVIVO CIRE \nN1: $request->n1_vivo_cire $request->horario_contato_n1_vivo_cire $request->forma_contato_n1_vivo_cire \nN2: $request->n2_vivo_cire $request->horario_contato_n2_vivo_cire $request->forma_contato_n2_vivo_cire \nN3: $request->n3_vivo_cire $request->horario_contato_n3_vivo_cire $request->forma_contato_n3_vivo_cire \nN4: $request->n4_vivo_cire $request->horario_contato_n4_vivo_cire $request->forma_contato_n4_vivo_cire \nN5: $request->n5_vivo_cire $request->horario_contato_n5_vivo_cire $request->forma_contato_n5_vivo_cire\n----------------------------------------------------\nEPS $request->nome_eps \nN1: $request->n1_eps $request->horario_contato_n1_eps $request->forma_contato_n1_eps \nN2: $request->n2_eps $request->horario_contato_n2_eps $request->forma_contato_n2_eps \n----------------------------------------------------\nAnalista Cire: $nome_usuario\nxxxxxxxxxxxxxxx Escalonamento $request->escalonamento_horas horas xxxxxxxxxxxxxx";

    $response['mensagem'] = "Carimbo gerado com sucesso.";

    //Atribuindo os valores
    $atividade->usuario_id = Auth::user()->id;
    $atividade->data_hora = date("Y-m-d H:i:s");
    $atividade->numero_ta = $request->numero_ta;
    $atividade->tipo_atividade_id = 2;
    $atividade->carimbo = $response['carimbo'];
    $atividade->save();

    return response()->json($response);
}
    
}

