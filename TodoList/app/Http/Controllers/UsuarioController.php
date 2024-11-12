<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // criar um usuario
    public function create()
    {
        return view('usuarios.create');
    }


    // armazenar os usuários
    public function store(Request $request)
    {
        // validação do formulário
        $request->validate(
            [
                'nome' => 'required|string|max:255',
                'email' => 'required|email|unique:usuarios,email',
            ],
            [
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'Por favor, insira um endereço de e-mail válido.',
                'email.unique' => 'Este e-mail já está em uso.',
            ]
        );

        // Criação do usuário
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        // Mensagem
        return redirect()->route('usuarios.create')->with('success', 'Cadastro realizado com sucesso!');
    }
}
