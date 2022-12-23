<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyVictim extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'family_victims';

    protected $fillable = [
        'id',
        'person_id',
        'nome_completo',
        'grau_parentesco',
        'idade',
        'outro'
    ];
}
