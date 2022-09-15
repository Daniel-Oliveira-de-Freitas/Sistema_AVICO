<?php

namespace App\Models;

use App\Enums\PaymentTypes;
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
     * Get the adress associated with the Person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adress(): HasOne
    {
        return $this->hasOne(Adress::class, 'person_id');
    }

    /**
     * Get the user associated with the Person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reason(): HasOne
    {
        return $this->hasOne(Reason::class, 'person_id');
    }

    /**
     * Get the user associated with the Person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'person_id');
    }

    /**
     * Get the user that owns the Person
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
