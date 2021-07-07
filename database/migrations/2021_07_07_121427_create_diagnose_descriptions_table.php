<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnoseDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnose_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diagnoses_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->text('content');
            $table->string('treatment_protocol');
            $table->foreign('diagnoses_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->foreign('patinets_id')->references('id')->on('patinets')->onDelete('cascade');
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
        Schema::dropIfExists('diagnose_descriptions');
    }
}
