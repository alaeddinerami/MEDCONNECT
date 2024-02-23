<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('doctorpatients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorID');
            $table->foreign('doctorID')->references('id')->on('doctors');
            $table->unsignedBigInteger('patientID');
            $table->foreign('patientID')->references('id')->on('patients');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctorpatients');
    }
};
