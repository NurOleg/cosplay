<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsNewColumnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->boolean('is_new')->default(0);
        });

        Schema::table('thematics', function (Blueprint $table) {
            $table->boolean('is_new')->default(0);
        });

        Schema::table('fandoms', function (Blueprint $table) {
            $table->boolean('is_new')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
