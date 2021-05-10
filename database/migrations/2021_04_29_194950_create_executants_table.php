<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executants', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('fullname');
            $table->string('phone');
            $table->string('password');
            $table->enum('sex', ['male', 'female']);
            $table->string('nickname');
            $table->string('country');
            $table->string('city');
            $table->string('description');
            $table->boolean('is_pro')->default(false);
            $table->timestamp('pro_until')->nullable()->default(null);
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
        Schema::dropIfExists('executants');
    }
}
