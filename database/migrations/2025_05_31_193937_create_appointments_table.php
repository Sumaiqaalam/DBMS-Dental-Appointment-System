<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
/* Appointment_ID
patient_ID
Dentist_ID
Status
Appointment_Date
Appointment_Time

*/
            $table->id(); //appointment id
            $table->foreignId('patient_id')->constrained('patient')->ondelete('cascade');
            $table->foreignId('dentist_id')->constrained('dentists')->ondelete('cascade');
            $table->string('status');
            $table->date('Appointment_Date');
            $table->time('Appointment_Time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
