<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cidade',
        'estado',
        'email',
        'telefone',
        'profissao',
        'infectado',
        'descricao',
        'active',
        'motivo',
        'voluntario',
        'contribuicao',
        'indicacoes'
    ];
}
