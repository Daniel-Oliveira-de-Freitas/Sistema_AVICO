<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

class File extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'person_id',
        'tipo_arquivo',
        'arquivos',
        'caminho_arquivos'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'person_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'arquivos' => 'array',
        'caminho_arquivos' => 'array'
    ];

    /**
     * Get the Pèrson that owns the files
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * Interact with the files
     */
    protected function arquivos(): Attribute
    {
        return Attribute::make(
            set: fn($value) => json_encode($value)
        );
    }

    /**
     * Interact with the files
     */
    protected function caminho_arquivos(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value)
        );
    }
}
