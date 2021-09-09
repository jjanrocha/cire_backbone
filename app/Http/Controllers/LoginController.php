<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {

        /* ##### Validação apenas com ID ##### */

        //Definição das regras de preenchimento do formulário
        $rules = [
            'id' => 'required',
        ];

        //Mensagens de erro
        $feedback = [
            'id.required' => 'O campo RE é de preenchimento obrigatório',
        ];

        //Validação do formulário
        $request->validate($rules, $feedback);

        //Autenticação do usuário
        if (Auth::loginUsingId($request->id)) {
            $request->session()->regenerate();
            return redirect()->intended();

        } else {
            return back()->withErrors([
                'id' => 'RE inválido',
            ])->withInput();
        }

        /* ##### Validação com ID e password #####

        //Definição das regras de preenchimento do formulário
        $rules = [
            'id' => 'required',
            'password' => 'required',
        ];

        //Mensagens de erro
        $feedback = [
            'id.required' => 'O campo RE é de preenchimento obrigatório',
            'password.required' => 'O campo senha é de preenchimento obrigatório',
        ];

        //Validação do formulário
        $request->validate($rules, $feedback);

        //Autenticação do usuário
        if (Auth::attempt(['id' => $request->id, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended();

        } else {
            return back()->withErrors([
                'password' => 'RE e/ou senha inválido(s)',
            ])->withInput($request->except('password'));
        }
        */

    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
