<?php

namespace App\Http\Livewire\Traits;

trait RegisterFormComponentStepRulesTrait
{
    private $validationRules = [
        1 => [
            'data.tipo' => 'required|array|min:1',
        ],
        2 => [
            'data.termos' => 'required',
        ],
        3 => [
            'data.nome' => 'required',
            'data.dataNascimento' => 'required',
            'data.password' => 'required|min:8|required_with:data.confirmPassword',
            'data.confirmPassword' => 'required|same:data.password|min:8',
            'data.genero' => 'required',
            'data.racaCor' => 'required',
            'data.cpf' => 'required|string|unique:persons,cpf',
            'data.rg' => 'required|string|max:18|min:10',
            'data.celular' => 'required',
            'data.email' => 'required|email|unique:users,email',
            'data.cep' => 'required|numeric|min:8',
            'data.endereco' => 'required|string',
            'data.cidade' => 'required',
            'data.uf' => 'required',
            'data.nmrEndereco' => 'required',
            'data.bairro' => 'required|string',
            'data.profissao' => 'required',
            'data.condicoes' => 'required|array|min:1'
        ],
        4 => [
            'data.pagamento' => 'required',
        ],
        5 => [
            'termoInscricao' => 'required|max:10024',
            'fileCpfRg' => 'required|max:10024',
            'fileComprovanteEndereco' => 'required|max:10024',
        ],
    ];

}
