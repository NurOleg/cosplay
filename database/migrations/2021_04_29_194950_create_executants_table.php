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
            $table->string('email')->nullable()->default(null);
            $table->string('fullname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('password');
            $table->enum('sex', ['male', 'female']);
            $table->string('nickname')->nullable()->default(null);
            $table->string('nickname_eng')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
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
