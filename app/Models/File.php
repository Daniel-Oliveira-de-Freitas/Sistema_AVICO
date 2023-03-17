<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $fillable = [
        'person_id',
        'arquivos',
        'caminho_arquivos'
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
    * Get the user that owns the Adress
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(Person::class, 'person_id');
   }
}
