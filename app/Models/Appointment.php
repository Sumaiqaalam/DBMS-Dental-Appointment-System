<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    public function patient()
{
    return $this->belongsTo(patientmodel::class);
}
protected $fillable = [
    'Appointment_Time',
    'status',
    // any other fields you update via mass-assignment
];


public function dentist()
{
    return $this->belongsTo(Dentist::class,'dentist_id');
}
public function billing()
{
    return $this->hasOne(Billing::class);
}
}
