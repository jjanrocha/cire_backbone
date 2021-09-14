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
        return view('app.carimbos.forms.controle.form_escalonamento_crise', ['lista_contratadas' => $lista_contratadas,]);
    }

    public function insertCarimboCrise() {
        
        $rules = [];

        $feedback = [];
        
        echo json_encode(['msg' => 'Requisição feita com sucesso']);
    }
}
