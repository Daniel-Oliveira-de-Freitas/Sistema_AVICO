<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
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
        'cidade',
        'uf',
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
        'file_id'
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }


    public function getCondicoesAttribute()
    {
        return json_decode($this->attributes['filenames']);
    }
}
