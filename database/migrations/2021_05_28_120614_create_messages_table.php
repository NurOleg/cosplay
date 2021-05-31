<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('customer_id')->nullable(true);
            $table->unsignedBigInteger('executant_id')->nullable(true);
            $table->text('message');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignUuid('chat_id')
                ->references('id')
                ->on('chats')
                ->onDelete('cascade');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('executant_id')
                ->references('id')
                ->on('executants')
                ->onDelete('set null');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
