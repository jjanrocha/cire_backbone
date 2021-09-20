<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;

class DashboardController extends Controller
{
    public function index() {
        $total_atividades = Atividade::count();
        return view('app.dashboard', ['title' => 'Dashboard', 'total_atividades' => $total_atividades]);
    }
}
