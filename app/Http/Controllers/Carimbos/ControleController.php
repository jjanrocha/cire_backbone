<?php

namespace App\Http\Controllers\Carimbos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAtividade;
use App\Models\Contratada;

class ControleController extends Controller
{
    public function carregarFormCrise() {
        $lista_contratadas = Contratada::orderBy('nome')->get();
        return view('app.carimbos.forms.controle.form_escalonamento_crise', ['lista_contratadas' => $lista_contratadas,]);
    }
}
