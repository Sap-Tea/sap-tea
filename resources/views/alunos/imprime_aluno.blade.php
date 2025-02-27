@extends('layouts.app')


@section('content')
<div class="container mt-4">
    <h2>Relação dos alunos</h2>

    <!-- Formulário de pesquisa -->
    <form method="GET" action="{{ route('aluno.perfil') }}">
        <div class="input-group mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Pesquisa por aluno"
                   value="{{ request('nome') }}">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <!-- Tabela de resultados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>RA do aluno</th>
                <th>Nome do aluno</th>
                <th>Responsável</th>
                <th>Tel. Responsável</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($resultados as $aluno)
                <tr>
                    <td>#</td>
                    <td>{{ $aluno->alu_ra }}</td>
                    <td>{{ $aluno->alu_nome }}</td>
                    <td>{{ $aluno->alu_nome_resp }}</td>
                    <td>{{ $aluno->alu_tel_resp }}</td>
                    <td>{{ $aluno->alu_email_resp }}</td>
                    <td>
                        <a href="{{ urloj_foccus/views/forms/formulario-edt-aluno.php?edit=' . $aluno->alu_id) }}"
                           class="btn btn-warning btn-sm">Editar</a>('/pr
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum aluno encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginação -->
    <div class="d-flex justify-content-center">
        @if ($pagina_atual > 1)
            <a href="{{ route('aluno.perfil', ['pagina' => 1, 'nome' => $nome]) }}" class="btn btn-primary me-2">Primeira</a>
            <a href="{{ route('aluno.perfil', ['pagina' => $pagina_atual - 1, 'nome' => $nome]) }}" class="btn btn-primary me-2">Anterior</a>
        @endif

        @for ($i = 1; $i <= $total_paginas; $i++)
            <a href="{{ route('aluno.perfil', ['pagina' => $i, 'nome' => $nome]) }}" class="btn btn-secondary me-2">
                {{ $i }}
            </a>
        @endfor

        @if ($pagina_atual < $total_paginas)
            <a href="{{ route('aluno.perfil', ['pagina' => $pagina_atual + 1, 'nome' => $nome]) }}" class="btn btn-primary me-2">Próxima</a>
            <a href="{{ route('aluno.perfil', ['pagina' => $total_paginas, 'nome' => $nome]) }}" class="btn btn-primary">Última</a>
        @endif
    </div>

    <a href="{{ url('/proj_foccus/index.php') }}" class="btn btn-primary mt-3">Voltar -> Menu</a>
</div>
@endsection
