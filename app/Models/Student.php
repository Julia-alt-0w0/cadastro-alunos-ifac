<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada com o model.
     * O Laravel já infere 'students' a partir de 'Student', 
     * mas é uma boa prática deixar explícito se desejar.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * A chave primária da tabela.
     *
     * @var string
     */
    protected $primaryKey = 'matricula';

    /**
     * O tipo de dado da chave primária.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indica se a chave primária é auto-incrementável.
     * Como 'matricula' é uma string, definimos como false.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indica se o model deve gerenciar timestamps (created_at e updated_at).
     * Como a tabela não possui essas colunas, definimos como false.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricula',
        'nome',
        'email',
        'curso',
    ];
}
