<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'phone',
        'email',
        'cv',
        'job_id',
        'job_title',
    ];

    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
 