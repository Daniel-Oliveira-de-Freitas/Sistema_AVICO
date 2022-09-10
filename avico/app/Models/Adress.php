<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'adresses'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rua',
        'nmrEndereco',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'person_id'
    ];
}
