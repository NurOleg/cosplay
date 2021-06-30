<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSocialColumnsExecutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executants', function (Blueprint $table) {
            $table->string('youtube')->nullable(true)->change();
            $table->string('vk')->nullable(true)->change();
            $table->string('twitter')->nullable(true)->change();
            $table->string('instagram')->nullable(true)->change();
            $table->string('facebook')->nullable(true)->change();
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
