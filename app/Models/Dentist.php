<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // <- extend this
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Dentist extends Authenticatable
{
     use Notifiable;
     protected $table = 'dentists';
      protected $fillable = [
        'Name',
        'Email',
        'Contact_No',
        'Specialization',
        'Username',
        'Password',
    
    ];
      public function dentalRecords()
    {
        return $this->hasMany(DentalRecord::class);
    }
    public function availabilities()
    {
        return $this->hasMany(Availability::class, 'dentist_id');
    }
}
