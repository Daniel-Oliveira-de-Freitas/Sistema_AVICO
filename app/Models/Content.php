<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'id',
        'user_id',
        'titulo',
        'conteudo',
        'tipo_pagina'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id'
    ];

    /**
     * Get the user that owns the Adress
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
