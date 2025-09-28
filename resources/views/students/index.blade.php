<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudantes</title>
    <!-- Incluindo Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3">Lista de Estudantes</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('students.create') }}" class="btn btn-primary">Cadastrar Novo Estudante</a>
        </div>
    </div>

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->matricula }}</td>
                            <td>{{ $student->nome }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->curso }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Botão Editar -->
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <!-- Formulário para Deletar -->
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este estudante?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhum estudante cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

