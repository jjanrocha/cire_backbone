<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;
use App\Models\TipoAtividade;
use App\Models\Contratada;
use App\Models\Equipamento;
use App\Models\Operadora;
use App\Models\AtualizacaoTelegram;

class AtualizacaoTelegramController extends Controller
{
    public function store(Request $request) {
        
        //Instanciar model
        $atividade = new AtualizacaoTelegram();

        //Atribuir valores ao objeto
        $atividade->numero_ta = $request->numero_ta;
        $atividade->usuario_id = Auth::user()->id;
        $atividade->data_hora = date("Y-m-d H:i:s");
        $atividade->tipo_bilhete = $request->tipo_bilhete;
        $atividade->rota_ponta_a = $request->rota_ponta_a;
        $atividade->rota_ponta_b = $request->rota_ponta_b;
        $atividade->trecho_ponta_a = $request->trecho_ponta_a;
        $atividade->trecho_ponta_b = $request->trecho_ponta_b;
        $atividade->possui_draco = $request->possui_draco;
        $atividade->equipamentos_v1 = $request->lista_equipamentos_v1_to;
        $atividade->equipamentos_v2 = $request->lista_equipamentos_v2_to;
        $atividade->redundancias_v2 = $request->redundancias_v2;
        $atividade->operadoras = $request->lista_operadoras_to;
        $atividade->afetacao_erbs = $request->afetacao_erbs;
        $atividade->afetacao_voz = $request->afetacao_voz;
        $atividade->afetacao_speedy = $request->afetacao_speedy;
        $atividade->afetacao_clientes = $request->afetacao_clientes;
        $atividade->afetacao_fttx = $request->afetacao_fttx;
        $atividade->lp = $request->lp;
        $atividade->horario_acionamento = $request->horario_acionamento;
        $atividade->ttmc = $request->ttmc;
        $atividade->status = $request->status;
        $atividade->escalonamento = $request->escalonamento;

        //Criação do array de carimbo que será retornado ao usuário
        $carimbo = array();

        //Primeira linha do carimbo (sempre número do TA e tipo de bilhete)
        $carimbo['informacoes_basicas'] = "TA: $atividade->numero_ta - $atividade->tipo_bilhete\n";

        //Segunda linha do carimbo (rota), podendo ser Ponta A x Ponta B ou apenas uma ponta
        if($atividade->rota_ponta_b != "") {
            $carimbo['rota'] = "ROTA: $atividade->rota_ponta_a X $atividade->rota_ponta_b\n";
        } else {
            $carimbo['rota'] = "ROTA: $atividade->rota_ponta_a\n";
        }

        //Segunda linha do carimbo (trecho ou localidade), podendo ser Ponta A x Ponta B (trecho) ou apenas uma ponta (localidade)
        if($atividade->trecho_ponta_b != "") {
            $carimbo['trecho_localidade'] = "TRECHO: $atividade->trecho_ponta_a X $atividade->trecho_ponta_b\n";
        } else {
            $carimbo['trecho_localidade'] = "LOCALIDADE: $atividade->trecho_ponta_a\n";
        }

        //Início do índice de afetação do carimbo
        $carimbo['afetacao'] = "";

        //Verificar se há draco afetado
        if($atividade->possui_draco != "") {
            $carimbo['afetacao'] .= " DRACO";
        }

        //Verificar se há equipamento(s) v1 afetado e como será a exibição no carimbo
        if($atividade->equipamentos_v1 != "") {
            $lista_equipamentos_v1 = "";
            if($carimbo['afetacao'] == "") {
            $carimbo['afetacao'] .= " VIVO 1 (";
            } else {
                $carimbo['afetacao'] .= "/VIVO 1 (";
            }
            foreach($atividade->equipamentos_v1 as $equipamento) {
                if($lista_equipamentos_v1 != "") {
                    $lista_equipamentos_v1 .= ', ';
                }
                $lista_equipamentos_v1 .= $equipamento;
            }
            $carimbo['afetacao'] .= $lista_equipamentos_v1;
            $carimbo['afetacao'] .= ")";
        }

        //Verificar se há equipamento(s) v2 afetado e como será a exibição no carimbo
        if($atividade->equipamentos_v2 != "") {
            $lista_equipamentos_v2 = "";
            if($carimbo['afetacao'] == "") {
            $carimbo['afetacao'] .= " VIVO 2 (";
            } else {
                $carimbo['afetacao'] .= "/VIVO 2 (";
            }
            foreach($atividade->equipamentos_v2 as $equipamento) {
                if($lista_equipamentos_v2 != "") {
                    $lista_equipamentos_v2 .= ', ';
                }
                $lista_equipamentos_v2 .= $equipamento;
            }
            $carimbo['afetacao'] .= $lista_equipamentos_v2;
            $carimbo['afetacao'] .= ")";
        }

        //Verificar se há operadora(s) afetada(s) e como será a exibição no carimbo
        if($atividade->operadoras != "") {
            $lista_operadoras = "";

            if($carimbo['afetacao'] == "" &&  $atividade->afetacao_voz == "" && $atividade->afetacao_speedy == "" && $atividade->afetacao_clientes == "" && count($atividade->operadoras) > 1) {
            $carimbo['afetacao'] .= " SWAPS - ";
            } elseif($carimbo['afetacao'] == "" && $atividade->afetacao_voz == "" && $atividade->afetacao_speedy == "" && $atividade->afetacao_clientes == "" && count($atividade->operadoras) == 1) {
                $carimbo['afetacao'] .= " SWAP - ";
            } elseif($carimbo['afetacao'] == !"") {
                $carimbo['afetacao'] .= "/";
            }
            foreach($atividade->operadoras as $operadora) {
                if($lista_operadoras != "") {
                    $lista_operadoras .= '/';
                }
                $lista_operadoras .= $operadora;
            }
            $carimbo['afetacao'] .= $lista_operadoras;
        }
        

        if($atividade->save()) {
            return response()->json($carimbo);
        }
        
    }
}
