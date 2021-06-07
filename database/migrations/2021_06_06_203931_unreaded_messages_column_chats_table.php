<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnreadedMessagesColumnChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->integer('executant_unreaded_messages_count')->default(0);
            $table->integer('customer_unreaded_messages_count')->default(0);
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->rememberToken();
        });

        Schema::table('executants', function (Blueprint $table) {
            $table->rememberToken();
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
