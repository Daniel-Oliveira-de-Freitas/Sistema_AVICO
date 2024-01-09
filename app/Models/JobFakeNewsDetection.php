<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFakeNewsDetection extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'job_fake_news_detection';
      /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'links',
        'cron',
        'emails'
        ];
}
