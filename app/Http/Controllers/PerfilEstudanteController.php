<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilEstudanteController extends Controller
{
    public function index()
    {
        return view('perfil-estudante'); // Certifique-se de que a view existe
    }

    public function store(Request $request)
    {
        // Validação dos dados (opcional)
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Aqui você pode salvar os dados no banco de dados
        // Exemplo:
        // PerfilEstudante::create($request->all());

        return redirect()->back()->with('success', 'Perfil salvo com sucesso!');
    }
}
