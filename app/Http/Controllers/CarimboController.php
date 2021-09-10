<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAtividade;

class CarimboController extends Controller
{
    public function carregarControle() {
        $lista_carimbos_controle = TipoAtividade::where('categoria', 'CONTROLE')->orderBy('categoria', 'asc')->get();

        return view('app.carimbos.controle', [
            'lista_carimbos_controle' => $lista_carimbos_controle,
            'title' => 'Controle'
        ]);
    }
}
