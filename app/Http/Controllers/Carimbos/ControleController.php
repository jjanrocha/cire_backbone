<?php

namespace App\Http\Controllers\Carimbos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function carregarFormCrise() {
        return view('app.carimbos.forms.controle.form_escalonamento_crise');
    }
}
