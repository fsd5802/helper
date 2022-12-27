<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $table = 'quote_requests';

    protected $guarded = [];

    public $timestamps = true;

    //relations start
    public function service(){
        return $this->belongsTo(Service::class);
    }
    //relations end

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
