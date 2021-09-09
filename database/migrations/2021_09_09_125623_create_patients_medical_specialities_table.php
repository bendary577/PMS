<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsMedicalSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('patients_medical_specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_speciality_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('medical_speciality_id')->references('id')->on('medical_specialities')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_medical_specialities');
    }
}
