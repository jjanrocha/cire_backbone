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
        $atividade->afetacao_iptv = $request->afetacao_iptv;
        $atividade->lp = $request->lp;
        $atividade->horario_acionamento = $request->horario_acionamento;
        $atividade->ttmc_numero = $request->ttmc;
        $atividade->ttmc_tipo = $request->ttmc_tipo;
        $atividade->ttmc_rede = $request->ttmc_rede;
        $atividade->status = $request->status;
        $atividade->escalonamento = $request->escalonamento;
        $atividade->tipo_status = $request->tipo_status;

        //Cria????o do array de carimbo que ser?? retornado ao usu??rio
        $carimbo = array();

        //Primeira linha do carimbo (sempre n??mero do TA e tipo de bilhete)
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

        //In??cio do ??ndice de afeta????o do carimbo
        $carimbo['afetacao'] = "";

        //Verificar se h?? draco afetado
        if($atividade->possui_draco != "") {
            $carimbo['afetacao'] .= " DRACO";
        }

        //Verificar se h?? equipamento(s) v1 afetado e como ser?? a exibi????o no carimbo
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

        //Verificar se h?? equipamento(s) e/ou redund??ncia(s) V2 afetado(s) e como ser?? a exibi????o no carimbo
        if($atividade->equipamentos_v2 != "" || $atividade->redundancias_v2 != "") {
            
            $lista_equipamentos_v2 = "";
            $descricao_quantidade_redundancias_v2 = "";

            if($atividade->redundancias_v2 == 1) {
                $descricao_quantidade_redundancias_v2 = "redund??ncia";
            } elseif($atividade->redundancias_v2 > 1) {
                $descricao_quantidade_redundancias_v2 = "redund??ncias";
            }

            if($carimbo['afetacao'] == "") {
            $carimbo['afetacao'] .= " VIVO 2 (";
            } else {
                $carimbo['afetacao'] .= "/VIVO 2 (";
            }

            if($atividade->equipamentos_v2 != "") {
                foreach($atividade->equipamentos_v2 as $equipamento) {
                    if($lista_equipamentos_v2 != "") {
                        $lista_equipamentos_v2 .= ', ';
                    }
                    $lista_equipamentos_v2 .= $equipamento;
                }
            }

            if($lista_equipamentos_v2 != "" && $atividade->redundancias_v2 != "") {
                $lista_equipamentos_v2 .= ', ';
                $lista_equipamentos_v2 .= "$atividade->redundancias_v2 $descricao_quantidade_redundancias_v2";
            } elseif($lista_equipamentos_v2 == "" && $atividade->redundancias_v2 != "") {
                $lista_equipamentos_v2 .= "$atividade->redundancias_v2 $descricao_quantidade_redundancias_v2";
            }

            $carimbo['afetacao'] .= $lista_equipamentos_v2;

            $carimbo['afetacao'] .= ")";
        }

        //Verificar se h?? operadora(s) afetada(s) e como ser?? a exibi????o no carimbo
        if ($atividade->operadoras != "") {
            $lista_operadoras = "";

            if ($carimbo['afetacao'] == "" && $atividade->erbs == "" && $atividade->afetacao_voz == "" && $atividade->afetacao_speedy == "" && $atividade->afetacao_clientes == "" && $atividade->afetacao_fttx == "" && $atividade->afetacao_iptv == "" && count($atividade->operadoras) > 1) {
                $carimbo['afetacao'] .= " SWAPS - ";
            } elseif ($carimbo['afetacao'] == "" && $atividade->erbs == "" && $atividade->afetacao_voz == "" && $atividade->afetacao_speedy == "" && $atividade->afetacao_clientes == "" && $atividade->afetacao_fttx == "" && $atividade->afetacao_iptv == "" && count($atividade->operadoras) == 1) {
                $carimbo['afetacao'] .= " SWAP - ";
            } elseif ($carimbo['afetacao'] == !"") {
                $carimbo['afetacao'] .= "/";
            }
            foreach ($atividade->operadoras as $operadora) {
                if ($lista_operadoras != "") {
                    $lista_operadoras .= '/';
                }
                $lista_operadoras .= $operadora;
            }
            $carimbo['afetacao'] .= $lista_operadoras;
        }

        //Verificar se h?? afeta????o de ERBs e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_erbs != "" || $atividade->afetacao_erbs > 0) {
            if ($atividade->afetacao_erbs == 1) {
                $titulo_afetacao_erbs = 'ERB';
            } else {
                $titulo_afetacao_erbs = 'ERBs';
            }
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " $atividade->afetacao_erbs $titulo_afetacao_erbs";
            } else {
                $carimbo['afetacao'] .= " | $atividade->afetacao_erbs $titulo_afetacao_erbs";
            }
        }

        //Verificar se h?? afeta????o de voz e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_voz != "" || $atividade->afetacao_voz > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " Voz: $atividade->afetacao_voz";
            } else {
                $carimbo['afetacao'] .= " | Voz: $atividade->afetacao_voz";
            }
        }

        //Verificar se h?? afeta????o de speedy e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_speedy != "" || $atividade->afetacao_speedy > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " Speedy: $atividade->afetacao_speedy";
            } else {
                $carimbo['afetacao'] .= " | Speedy: $atividade->afetacao_speedy";
            }
        }

        //Verificar se h?? afeta????o de clientes e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_clientes != "" || $atividade->afetacao_clientes > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " Clientes: $atividade->afetacao_clientes";
            } else {
                $carimbo['afetacao'] .= " | Clientes: $atividade->afetacao_clientes";
            }
        }

        //Verificar se h?? afeta????o de FTTX e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_fttx != "" || $atividade->afetacao_fttx > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " FTTX: $atividade->afetacao_fttx";
            } else {
                $carimbo['afetacao'] .= " | FTTX: $atividade->afetacao_fttx";
            }
        }

        //Verificar se h?? afeta????o de IPTV e como ser?? a exibi????o no carimbo
        if ($atividade->afetacao_iptv != "" || $atividade->afetacao_iptv > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " FTTX: $atividade->afetacao_iptv";
            } else {
                $carimbo['afetacao'] .= " | FTTX: $atividade->afetacao_iptv";
            }
        }

        //Verificar se h?? afeta????o de LP e como ser?? a exibi????o no carimbo
        if ($atividade->lp != "" || $atividade->lp > 0) {
            if ($carimbo['afetacao'] == "") {
                $carimbo['afetacao'] .= " LP - $atividade->lp";
            } else {
                $carimbo['afetacao'] .= " | LP - $atividade->lp";
            }
        }

        //Fim da afeta????o
        $carimbo['afetacao'] .= "\n";

        //Hor??rio de acionamento (EPS)
        $data_formatada = date('d/m/Y H:i', strtotime($atividade->horario_acionamento));
        $carimbo['horario_acionamento'] = $data_formatada;

        //TTMC
        $carimbo['ttmc'] = "";
        if ($atividade->ttmc_numero != "") {
            $carimbo['ttmc'] .= "\n\nTTMC - $atividade->ttmc_numero - Informe de Risco - $atividade->ttmc_tipo - $atividade->ttmc_rede";
        }

        //Status
        $carimbo['status'] = "\n\n$atividade->status";

        //Escalonamento
        $carimbo['escalonamento'] = "\n\nESCALONAMENTO: $atividade->escalonamento";

        //Analista CIRE
        $carimbo['analista_cire'] = "\n\nAnalista CIRE: " . ucwords(session()->get('nome'));
        

        if($atividade->save()) {
            return response()->json($carimbo);
        }
        
    }

    public function carregarDados() {
        $atividade = new AtualizacaoTelegram();

        $response = $atividade->where('numero_ta', $_POST['numero_ta'])->orderBy('data_hora', 'DESC')->first();

        $response['equipamentos_v1'] = explode(',', $response['equipamentos_v1']);
        $response['equipamentos_v2'] = explode(',', $response['equipamentos_v2']);
        $response['operadoras'] = explode(',', $response['operadoras']);

        return $this->response->setJSON($response);
    }
}
