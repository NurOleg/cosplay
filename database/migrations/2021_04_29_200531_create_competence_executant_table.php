<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceExecutantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_executant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competence_id');
            $table->unsignedBigInteger('executant_id');
        });

        Schema::table('competence_executant', function (Blueprint $table) {
            $table
                ->foreign('competence_id')
                ->references('id')
                ->on('competences');

            $table
                ->foreign('executant_id')
                ->references('id')
                ->on('executants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_executant');
    }
}
