<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Setting extends Model
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','desc','small_desc','address' ,'formTo'];
    protected $fillable = ['image','phone','email','gpsLink','logo','sales','rate','ventures'];
}
