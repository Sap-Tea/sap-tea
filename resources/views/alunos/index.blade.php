<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>inep</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->alu_id }}</td>
                    <td>{{ $aluno->alu_nome}}</td>
                    <td>{{ $aluno->alu_inep}}</td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum aluno encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
