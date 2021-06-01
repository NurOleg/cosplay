<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place_title');
            $table->string('address');
            $table->longText('body');
            $table->string('image_src');
            $table->boolean('active')->default(1);
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->point('point');
            $table->json('programm');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
