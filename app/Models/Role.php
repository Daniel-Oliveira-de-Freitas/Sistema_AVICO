<?php

namespace App\Models;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable= [
        'name'
     ];

     /**
      * The roles that belong to the Role
      *
      * @return BelongsToMany
      */
     public function person(): BelongsToMany
     {
         return $this->belongsToMany(Person::class, 'model_has_roles', 'model_id', 'role_id');
     }
}
