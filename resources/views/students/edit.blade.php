<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
    <!-- Incluindo Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h1 class="h4 mb-0">Editando Estudante: {{ $student->nome }}</h1>
                </div>
                <div class="card-body">
                    <!-- Formulário aponta para a rota 'students.update' -->
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf <!-- Token de segurança -->
                        @method('PUT') <!-- Método HTTP para atualização -->

                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $student->matricula }}" readonly disabled>
                            <div class="form-text">A matrícula não pode ser alterada.</div>
                        </div>

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $student->nome) }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <select class="form-select @error('curso') is-invalid @enderror" id="curso" name="curso" required>
                                @php
                                    $courses = ['Administração', 'Sistemas para Internet', 'Ciências Biológicas', 'Matemática'];
                                @endphp
                                @foreach ($courses as $course)
                                    <option value="{{ $course }}" @if(old('curso', $student->curso) == $course) selected @endif>{{ $course }}</option>
                                @endforeach
                            </select>
                            @error('curso')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-warning">Atualizar Estudante</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

