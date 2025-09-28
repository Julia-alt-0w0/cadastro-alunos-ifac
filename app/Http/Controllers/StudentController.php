<?php

namespace App\Http\Controllers;

use App\Models\Student; // Importa o seu Model Student
use Illuminate\Http\Request; // Importa a classe Request para lidar com os dados do formulário

class StudentController extends Controller
{
    /**
     * Exibe a lista de todos os estudantes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::all(); // Pega todos os estudantes do banco

        // Retorna a view em 'resources/views/students/index.blade.php'
        // e passa a variável $students para ela.
        return view('students.index', compact('students'));
    }

    /**
     * Mostra o formulário para criar um novo estudante.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // A convenção é que a view para este formulário esteja em:
        // resources/views/students/create.blade.php
        return view('students.create');
    }

    /**
     * Salva o novo estudante no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário.
        $validatedData = $request->validate([
            'matricula' => 'required|string|max:255|unique:students,matricula',
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:students,email',
            'curso'     => 'required|string|max:255',
        ]);

        // Cria o novo registro no banco de dados.
        Student::create($validatedData);

        // Redireciona o usuário para a lista com uma mensagem de sucesso.
        return redirect()->route('students.index')
                         ->with('success', 'Estudante cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário para editar um estudante existente.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\View\View
     */
    public function edit(Student $student)
    {
        // Carrega a view 'edit.blade.php' e passa os dados do estudante para ela.
        return view('students.edit', compact('student'));
    }

    /**
     * Atualiza os dados do estudante no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        // Valida os dados. A regra 'unique' para o e-mail precisa ignorar o registro atual.
        $validatedData = $request->validate([
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $student->getKey() . ',' . $student->getKeyName(),
            'curso' => 'required|string|max:255',
        ]);

        // Atualiza o registro do estudante com os novos dados.
        $student->update($validatedData);

        // Redireciona de volta para a lista com uma mensagem de sucesso.
        return redirect()->route('students.index')
                         ->with('success', 'Dados do estudante atualizados com sucesso!');
    }

    /**
     * Remove o estudante do banco de dados.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student)
    {
        // Deleta o registro do estudante.
        $student->delete();

        // Redireciona de volta para a lista com uma mensagem de sucesso.
        return redirect()->route('students.index')
                         ->with('success', 'Estudante excluído com sucesso!');
    }
}

