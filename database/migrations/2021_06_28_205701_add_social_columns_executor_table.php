<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialColumnsExecutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executants', function (Blueprint $table) {
            $table->string('youtube')->default('');
            $table->string('vk')->default('');
            $table->string('twitter')->default('');
            $table->string('instagram')->default('');
            $table->string('facebook')->default('');
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
