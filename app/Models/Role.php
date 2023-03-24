<?php

namespace App\Models;

use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable= [
        'name'
     ];
     
     /**
      * The roles that belong to the Role
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function person(): BelongsToMany
     {
         return $this->belongsToMany(Person::class, 'model_has_roles', 'model_id','role_id');
     }
}
