<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PerfilEstudante;

class InserirPerfilEstudante extends Controller
{
    public function inserir_perfil_estudante(Request $request)
    {
        if (!$request->has('diag_laudo') || !in_array($request->input('diag_laudo'), [0, 1])) {
            return response()->json(['message' => 'Valor inválido para diag_laudo. Deve ser 0 ou 1'], 400);
        }

        try {
            $perfilEstudante = PerfilEstudante::create([
                'diag_laudo' => $request->input('diag_laudo'),
                'cid' => $request->input('cid'),
                'nome_medico' => $request->input('nome_medico'),
                'data_laudo' => $request->input('data_laudo'),
              
            ]);
            
            // Retorne uma mensagem de sucesso
            return response()->json(['message' => 'Perfil criado com sucesso'], 201);
        } catch (\Exception $e) {
            // Retorne uma mensagem de erro
            return response()->json(['message' => 'Erro ao criar perfil: ' . $e->getMessage()], 500);
        }
    }
}
