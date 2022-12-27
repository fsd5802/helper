<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'service_requests';

    protected $guarded = [];

    public $timestamps = true;

    // accessors & Mutator start
    public function getNameAttribute($val)
    {
        return $this->attributes['name'] = ucwords($val);
    }

    public function getMessageAttribute($val)
    {
        return $this->attributes['name'] = ucfirst($val);
    }
    // accessors & Mutator end
}
