<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'nome',
        'dataNascimento',
        'genero',
        'cpf',
        'rg',
        'celular',
        'telefone_residencial',
        'email',
        'endereco',
        'nmrEndereco',
        'complemento',
        'cep',
        'bairro',
        'cidade_uf',
        'profissao',
        'condicoes',
        'grauParentesco',
        'outro',
        'pagamento',
        'cpf_rg',
        'comprovanteMedico',
        'certidaoObito',
        'comprovanteEndereco',
        'comprovanteRenda',
    ];
}
