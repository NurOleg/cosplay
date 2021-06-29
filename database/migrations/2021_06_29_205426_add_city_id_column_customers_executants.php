<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdColumnCustomersExecutants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executants', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->foreignId('city_id')->default(2)->references('id')->on('cities');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->foreignId('city_id')->default(2)->references('id')->on('cities');
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
