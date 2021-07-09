<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCodesNonUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('fandoms', function (Blueprint $table) {
        //    $table->dropUnique('fandoms_code_unique');
        //});
//
        //Schema::table('thematics', function (Blueprint $table) {
        //    $table->dropUnique('thematics_code_unique');
        //});
//
        //Schema::table('heroes', function (Blueprint $table) {
        //    $table->dropUnique('heroes_code_unique');
        //});
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
