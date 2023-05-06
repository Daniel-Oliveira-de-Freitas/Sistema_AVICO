<?php

namespace App\Models;

use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
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
        'genero',
        'raca_cor',
        'cpf',
        'rg',
        'telefone',
        'telefone_residencial',
        'profissao',
        'tipo_pagamento',
        'declaracao_isencao',
        'dados_adicionais'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int>
     */
    protected $hidden = [
        'user_id'
    ];

    protected $casts = [
        'tipo_pagamento' => PaymentType::class
    ];

    /**
     *  Associa os registro de adresses com person
     *
     * @return HasOne
     */
    public function adress(): HasOne
    {
        return $this->hasOne(Adress::class, 'person_id');
    }

    /**
     * Associa os registro de reason com person
     *
     * @return HasOne
     */
    public function reason(): HasOne
    {
        return $this->hasOne(Reason::class, 'person_id');
    }

    /**
     * Associa os registro de file com person
     *
     * @return HasOne
     */
    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'person_id');
    }

    /**
     * Associa os registro de user com person
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
