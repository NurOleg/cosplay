<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(false);
            $table->string('name')->nullable(false);
            $table->timestamps();
        });

        $data = [
            [
                'code' => 'promo',
                'name' => 'Участие в промоакциях',
            ],
            [
                'code' => 'garb_rent',
                'name' => 'Аренда костюма',
            ],
            [
                'code' => 'filming',
                'name' => 'Участие в съёмках фильмов/сериалов',
            ],
            [
                'code' => 'photosessions',
                'name' => 'Участие в совместных проектах/фотосессиях',
            ],
            [
                'code' => 'garb_sell',
                'name' => 'Продажа костюма',
            ],
            [
                'code' => 'advertising',
                'name' => 'Участие в рекламных проектах',
            ],
        ];


        Service::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
