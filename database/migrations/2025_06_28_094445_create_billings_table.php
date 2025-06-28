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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
         $table->unsignedBigInteger('appointment_id');
         $table->string('Payment Method');
        $table->decimal('amount', 8, 2);
        $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->timestamps();
             $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
