<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'filenames',
        'registration_id',
    ];

    public function user()
    {
        return $this->hasOne(Registration::class);
    }


    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }
    public function setFilePathAttribute($value)
    {
        $this->attributes['file_path'] = json_encode($value);
    }
}
