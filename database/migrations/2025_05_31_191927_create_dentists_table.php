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
        Schema::create('dentists', function (Blueprint $table) {
/*Dentist_ID
Name
Email
Contact_No
Specialization
Time_Slots
Availability_Day
 */
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Contact_No');
            $table->string('Specialization');
            $table->time('Time_Slots');
            $table->string('Availaibility_Day');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentists');
    }
};
