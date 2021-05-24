<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $casts = [
        'data_nascimento' => 'datetime:d-m-Y',
    ];
    // public $timestamps = false;
    protected $fillable = ['ra', 'nome', 'email', 'cpf', 'celular', 'genero', 'data_nascimento', 'status', 'curso_id'];

    public function curso()
    {
        return $this->hasOne(Curso::class);
    }
}
