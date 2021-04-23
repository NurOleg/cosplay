<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru')->nullable();
            $table->string('name_eng')->nullable();
            $table->string('code')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        DB::statement(file_get_contents(__DIR__ . '/sql/cosplay_heroes.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
