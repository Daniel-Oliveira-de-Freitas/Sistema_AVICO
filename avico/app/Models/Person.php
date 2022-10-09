<?php

namespace App\Models;

use App\Enums\PaymentTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $casts = [
        'tipo_pagamento' => PaymentTypes::class
    ];

    /**
     *  Associa os registro de adresses com person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adress(): HasOne
    {
        return $this->hasOne(Adress::class, 'person_id');
    }

    /**
     * Associa os registro de reason com person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reason(): HasOne
    {
        return $this->hasOne(Reason::class, 'person_id');
    }

    /**
     * Associa os registro de file com person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'person_id');
    }

    /**
     * Associa os registro de user com person
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn($value) => format_document($value),
        );    
    }
}
