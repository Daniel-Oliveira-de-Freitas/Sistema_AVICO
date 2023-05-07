<?php

namespace App\Actions;

class RegisterFormGetPropertiesAction
{
    public static function initializeEmptyArray(): array
    {
        return [
            'tipo' => [],
            'termos' => '',
            'nome' => '',
            'dataNascimento' => '',
            'password' => '',
            'confirmPassword' => '',
            'genero' => '',
            'racaCor' => '',
            'cpf' => '',
            'rg' => '',
            'celular' => '',
            'telefoneResidencial' => '',
            'email' => '',
            'cep' => '',
            'endereco' => '',
            'nmrEndereco' => '',
            'cidade' => '',
            'uf' => '',
            'complemento' => '',
            'bairro' => '',
            'profissao' => '',
            'condicoes' => [],
            'pagamento' => null,
            'parentesco' => '',
            'outros' => '',
            'declaracaoIsencao' => false,
            'dadosAdicionais' => collect([['nome' => '', 'parentesco' => '', 'idade' => '', 'outro' => '']])
        ];
    }
}
