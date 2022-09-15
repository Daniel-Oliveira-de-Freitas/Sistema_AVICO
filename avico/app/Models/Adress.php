<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'person_id',
        'rua',
        'nmrEndereco',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'estado'
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
     * Get the user that owns the Adress
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
