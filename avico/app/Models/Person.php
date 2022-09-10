<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nome_completo',
        'data_nascimento',
        'cpf',
        'rg',
        'telefone',
        'telefone_residencial',
        'profissao',
        'tipo_pagamento'
    ];
}
