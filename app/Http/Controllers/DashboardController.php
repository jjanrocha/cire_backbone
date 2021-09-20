<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;

class DashboardController extends Controller
{
    public function index() {
        $atividades = Atividade::all();
        return view('app.dashboard', ['title' => 'Dashboard', 'atividades' => $atividades]);
    }
}
