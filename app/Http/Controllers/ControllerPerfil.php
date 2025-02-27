<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPerfil extends Controller
{
    public function imprimeAluno(Request $request)
    {
        // Parâmetros da pesquisa
        $nome = $request->query('nome', '');
        $pagina_atual = $request->query('pagina', 1);
        $registros_por_pagina = 20;
        $inicio = ($pagina_atual - 1) * $registros_por_pagina;

        // Consulta ao banco usando Query Builder
        $query = DB::table('aluno');

        if (!empty($nome)) {
            $query->where('alu_nome', 'LIKE', '%' . $nome . '%');
        }

        $resultados = $query
            ->orderBy('alu_nome')
            ->offset($inicio)
            ->limit($registros_por_pagina)
            ->get();

        // Contagem total de registros
        $total = DB::table('aluno')
            ->when($nome, function ($q) use ($nome) {
                return $q->where('alu_nome', 'LIKE', '%' . $nome . '%');
            })
            ->count();

        $total_paginas = ceil($total / $registros_por_pagina);

        // Retorna a view com os dados
        return view('alunos.imprime_aluno', compact('resultados', 'pagina_atual', 'total_paginas', 'nome'));
    }
}
