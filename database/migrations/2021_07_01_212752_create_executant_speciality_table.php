<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutantSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executant_speciality', function (Blueprint $table) {
            $table->id();
            $table->foreignId('executant_id')->references('id')->on('executants');
            $table->foreignId('speciality_id')->references('id')->on('specialities');
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
        Schema::dropIfExists('executant_speciality');
    }
}
