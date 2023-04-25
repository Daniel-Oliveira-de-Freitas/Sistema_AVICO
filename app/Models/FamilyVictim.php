<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyVictim extends Model
{
    public $timestamps = false;
    protected $table = 'family_victims';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'id',
        'person_id',
        'nome_completo',
        'grau_parentesco',
        'idade',
        'outro'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'person_id'
    ];
}
