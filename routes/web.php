<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; // Importa o seu controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Redireciona a rota principal para a lista de estudantes
    return redirect()->route('students.index');
});

// Esta única linha cria todas as rotas necessárias para o CRUD de estudantes:
// GET /students -> index()
// GET /students/create -> create()
// POST /students -> store()
// GET /students/{student} -> show()
// GET /students/{student}/edit -> edit()
// PUT/PATCH /students/{student} -> update()
// DELETE /students/{student} -> destroy()
Route::resource('students', StudentController::class);

