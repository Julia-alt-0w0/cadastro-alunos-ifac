<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Estudante</title>
    <!-- Incluindo Bootstrap 5 para uma estilização rápida -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0">Cadastro de Novo Estudante</h1>
                </div>
                <div class="card-body">
                    <!-- Formulário aponta para a rota 'students.store' via método POST -->
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf <!-- Token de segurança do Laravel -->

                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input type="text" class="form-control @error('matricula') is-invalid @enderror" id="matricula" name="matricula" value="{{ old('matricula') }}" required>
                            @error('matricula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <select class="form-select @error('curso') is-invalid @enderror" id="curso" name="curso" required>
                                <option value="" disabled selected>Selecione um curso</option>
                                <option value="Administração" @if(old('curso') == 'Administração') selected @endif>Administração</option>
                                <option value="Sistemas para Internet" @if(old('curso') == 'Sistemas para Internet') selected @endif>Sistemas para Internet</option>
                                <option value="Ciências Biológicas" @if(old('curso') == 'Ciências Biológicas') selected @endif>Ciências Biológicas</option>
                                <option value="Matemática" @if(old('curso') == 'Matemática') selected @endif>Matemática</option>
                            </select>
                            @error('curso')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Estudante</button>
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

