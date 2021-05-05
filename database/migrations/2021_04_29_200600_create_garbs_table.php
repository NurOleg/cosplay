<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use App\Models\Fandom;
use App\Models\Thematic;
use App\Models\Hero;
use Illuminate\Support\Facades\Schema;

class CreateGarbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fandom_id');
            $table->unsignedBigInteger('thematic_id');
            $table->unsignedBigInteger('hero_id');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::table('garbs', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table
                ->foreign('fandom_id')
                ->references('id')
                ->on('fandoms');

            $table
                ->foreign('thematic_id')
                ->references('id')
                ->on('thematics');

            $table
                ->foreign('hero_id')
                ->references('id')
                ->on('heroes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garbs');
    }
}
