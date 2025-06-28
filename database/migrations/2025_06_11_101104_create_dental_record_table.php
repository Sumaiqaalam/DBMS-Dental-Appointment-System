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
        Schema::create('dental_record', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient')->ondelete('cascade');
            $table->foreignId('dentist_id')->constrained('dentists')->ondelete('cascade');
            $table->string('Notes');
            $table->string('Prescribtion');
            $table->string('Treatment_provided');
            $table->string('Diagnosis');
            $table->date('Visit_Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_record');
    }
};
