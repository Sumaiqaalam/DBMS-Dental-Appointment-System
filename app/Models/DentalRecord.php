<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentalRecord extends Model
{
 protected $table = 'dental_record';
 
    protected $fillable = [
        'Treatment_provided',
        'Notes',
        'Diagnosis',
        'Visit_Date',
        'Prescribtion',
        'patient_id',      // if you're setting this too
        'dentist_id'       // if applicable
    ];
    public function patient()
    {
        return $this->belongsTo(patientmodel::class);
    }

    // Define relationship to Dentist
    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }
}

