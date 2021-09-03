<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authentication(Request $request) {

        $credentials = $request->only('re_usuario', 'password');

        if (Auth::attempt($credentials)) { 
            return 'Usuário autenticado';
        } else {
            return 'Falha na autenticação';
        }

        /*
        if(Auth::attempt(['re_usuario' => $re_usuario, 'senha' => $senha])){
            return 'Usuário autenticado';
        } else {
            return 'Usuário não autenticado';
        }
        */
        //dd($credentials);
    }
}
