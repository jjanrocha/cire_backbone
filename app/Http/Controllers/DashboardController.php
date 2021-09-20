<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Atividade;

class DashboardController extends Controller
{
    public function index() {

        //Retornar o total de atividades
        $total_atividades = Atividade::count();

        //Retornar o total de atividades do tipo Escalonamento Crise (controle)
        $total_escalonamento_crise = DB::table('cire_backbone_atividades')
        ->join('cire_backbone_tipos_atividades', 'cire_backbone_atividades.tipo_atividade_id', '=', 'cire_backbone_tipos_atividades.id')
        ->select('cire_backbone_atividades.*')
        ->count();

        return view('app.dashboard',[
            'title' => 'Dashboard',
            'total_atividades' => $total_atividades,
            'total_escalonamento_crise' => $total_escalonamento_crise
        ]);
    }
}
