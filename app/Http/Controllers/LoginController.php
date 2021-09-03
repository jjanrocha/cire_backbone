<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authentication(Request $request) {

        $credentials = $request->only('re_usuario', 'password');

        //Definição das regras de validação
        $rules = [
            're_usuario' => 'required',
            'password' => 'required',
        ];

        //Mensagens de erro
        $feedback = [
            're_usuario.required' => 'O campo RE é de preenchimento obrigatório',
            'password.required' => 'O campo senha é de preenchimento obrigatório',
        ];

        //Validação do formulário
        $request->validate($rules, $feedback);

        //Autenticação do usuário
        if (Auth::attempt($credentials)) { 
            return 'Usuário autenticado';
        } else {
            return back()->withErrors([
                'password' => 'RE e/ou senha inválido(s)',
            ])->withInput($request->except('password'));
        }

    }
}
