<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_profile_id')->nullable();
            $table->float('examination_price');
            $table->float('follow_up_price');
            $table->time('available_from');
            $table->time('available_to');
            $table->enum('department', ['adults', 'children']);
            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('clinics');
    }
}
