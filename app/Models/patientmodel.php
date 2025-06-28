<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ This is required
use Illuminate\Notifications\Notifiable;

class patientmodel extends Authenticatable
{
    use Notifiable;

    protected $table = 'patient'; // ✅ Your table name if it's not 'users'

    protected $fillable = [
        'Username', 
        'Password',
        // Add other fields you want to mass assign
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
  public function getAuthIdentifierName()
    {
        return 'Username';
    }
public function dentalRecords()
{
    return $this->hasMany(DentalRecord::class, 'patient_id');
}

}
