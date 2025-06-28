<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availabilities';
     public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }
}
