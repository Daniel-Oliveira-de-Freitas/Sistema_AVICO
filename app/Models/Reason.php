<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reason extends Model
{
    public $timestamps = false;
    protected $table = 'reasons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'condicao',
        'grau_parentesco',
        'outros'
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
     * Get the user that owns the Reason
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'person_id');
    }

    /**
     * Interact with the reason condicao
     */
    protected function condicao(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_array($value) ? $value : json_decode($value),
            set: fn ($value) => json_encode($value)
        );
    }
}
