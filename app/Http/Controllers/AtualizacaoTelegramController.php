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
        echo json_encode(['response' => 'Requisição feita e retornada com sucesso.']);
    }
}
