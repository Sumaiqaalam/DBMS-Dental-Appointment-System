<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
  use HasFactory;
protected $table = 'billings';
    protected $fillable = [
        'appointment_id',
        'payment_method',
        'amount',
        'status',
    ];

    // Relationship to appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
