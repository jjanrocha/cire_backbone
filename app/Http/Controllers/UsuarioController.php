<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = User::all();
        return view('app.users.index', ['usuarios' => $usuarios]);
    }

    public function create() {
        return view('app.users.create');
    }

    public function store(Request $request) {

        //dd($request->all());

        $rules = [
            'nome' => 'required|min:3|max:120',
            'id' => 'required|digits_between:1,120|unique:cire_backbone_usuarios|',
            'nivel' => 'required|min:3|max:120',
        ];

        $feedback = [
            'nome.required' => 'O campo nome é de preenchimento obrigatório.',
            'nome.min' => 'O campo nome deve possuir no mímino :min caracteres.',
            'nome.max' => 'O campo nome deve possuir no máximo :max caracteres.',
            'id.required' => 'O campo RE é de preenchimento obrigatório.',
            'id.digits_between' => 'O campo RE deve possuir de 1 a 120 digitos.',
            'id.unique' => 'Já existe um usuário cadastrado como RE informado.',
            'nivel.required' => 'O campo nível é de preenchimento obrigatório.',
            'nivel.min' => 'Entrada inválida.',
            'nivel.max' => 'Entrada inválida.',
        ];

        $validator = $request->validate($rules, $feedback);

        $usuario = new User();

        $usuario->id = $request->id;
        $usuario->nome = $request->nome;
        $usuario->password = bcrypt($request->id);
        $usuario->nivel = $request->nivel;
        $usuario->save();

        return redirect()->route('usuarios.edit', ['user' => $request->id]);
    }

    /*
    public function show() {
        //
    }
    */

    public function edit(Request $request, User $user) {
        dd($user->getAttributes());
    }

    public function update() {
        //
    }

    public function delete() {
        //
    }

}
