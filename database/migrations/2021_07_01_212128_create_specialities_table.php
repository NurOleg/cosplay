<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Speciality;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(false);
            $table->string('name')->nullable(false);
            $table->timestamps();
        });


        $data = [
          [
              'code' => 'cosplayer',
              'name' => 'косплеер',
          ],
          [
              'code' => 'makeup_artist',
              'name' => 'гример',
          ],
          [
              'code' => 'crafter',
              'name' => 'крафтер',
          ],
          [
              'code' => 'plastic_makeup_artist',
              'name' => 'пластический гример',
          ],
          [
              'code' => 'tailor',
              'name' => 'швея / портной',
          ],
          [
              'code' => 'wickmaker',
              'name' => 'викмейкер',
          ],
        ];


        Speciality::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialities');
    }
}
