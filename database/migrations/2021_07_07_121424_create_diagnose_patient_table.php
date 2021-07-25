<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnose_patient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diagnose_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->text('description')->nullable();
            $table->string('treatment_protocol')->nullable();
            $table->foreign('diagnose_id')->references('id')->on('diagnoses')->onDelete('cascade');
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
        Schema::dropIfExists('diagnose_patient');
    }
}
