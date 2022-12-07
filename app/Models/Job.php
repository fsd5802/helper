<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Job extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $fillable = ['id'];
    public $translatedAttributes = ['name','skills','description','job_title'];
}
