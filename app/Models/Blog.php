<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Blog extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name' , 'desc'];
    protected $fillable = ['image' , 'work_id'];
    
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
