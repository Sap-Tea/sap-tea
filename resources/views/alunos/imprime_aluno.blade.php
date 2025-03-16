@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Relação dos Alunos</h2>

    <!-- Formulário de Pesquisa -->
    <form method="POST" action="{{ route('inserir_perfil') }}">
        <div class="input-group mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Pesquisar por aluno"
                   value="{{ request('nome') }}">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <!-- Tabela de Resultados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>RA do Aluno</th>
                <th>Nome do Aluno</th>
                <th>Responsável</th>
                <th>Tel. Responsável</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alunos as $aluno)
                <tr>
                    <!-- Número da linha -->
                    <td>{{ $loop->iteration }}</td> 
                    <!-- Dados do aluno -->
                    <td>{{ $aluno->alu_ra }}</td>
                    <td>{{ $aluno->alu_nome }}</td>
                    <td>{{ $aluno->alu_nome_resp }}</td>
                    <td>{{ $aluno->alu_tel_resp }}</td>
                    <td>{{ $aluno->alu_email_resp }}</td>

                    <!-- Botão Visualizar -->
                    <td>
                    <a href="{{ route('alunos.index', ['id' => $aluno->alu_id]) }}" 
                    class="btn btn-primary btn-sm">Visualizar</a>


                    </td>
                </tr>
            @empty
                <!-- Caso não existam alunos -->
                <tr>
                    <td colspan="7" class="text-center">Nenhum aluno encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginação -->
    @if ($alunos instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-center">
            {{ $alunos->links() }}
        </div>
    @endif

    <!-- Botão Voltar -->
    <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Voltar -> Menu</a>
</div>
@endsection
