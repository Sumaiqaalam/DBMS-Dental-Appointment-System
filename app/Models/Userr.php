<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Userr extends Authenticatable
{
    use Notifiable;
     protected $table = 'users';
      protected $fillable = [
        'name', 
        'username',
        'password',
        // Add other fields you want to mass assign
    ];
}
