<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Testmonial extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name' , 'desc' , 'job'];
    protected $fillable = ['image'];
}
