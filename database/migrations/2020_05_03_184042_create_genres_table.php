<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
        });

        DB::table('genres')->insert(
        [[
            'name' => 'вестерн',
            'code' => 'western'
        ],
        [
            'name' => 'биография',
            'code' => 'biography'
        ],
        [
            'name' => 'боевик',
            'code' => 'boevik'
        ],
        [
            'name' => 'военный',
            'code' => 'military'
        ],
        [
            'name' => 'детектив',
            'code' => 'detective'
        ],
        [
            'name' => 'драма',
            'code' => 'drama'
        ],
        [
            'name' => 'документальный',
            'code' => 'documentary'
        ],


        [
            'name' => 'история',
            'code' => 'history'
        ],
        [
            'name' => 'комедия',
            'code' => 'comedy'
        ],
        [
            'name' => 'криминал',
            'code' => 'criminal'
        ],
        [
            'name' => 'мелодрама',
            'code' => 'melodrama'
        ],
        [
            'name' => 'музыка',
            'code' => 'music'
        ],
        [
            'name' => 'мультфильм',
            'code' => 'cartoon'
        ],
        [
            'name' => 'приключения',
            'code' => 'adventure'
        ],


        [
            'name' => 'семейный',
            'code' => 'family'
        ],
        [
            'name' => 'сериалы',
            'code' => 'serial'
        ],
        [
            'name' => 'спорт',
            'code' => 'sport'
        ],
        [
            'name' => 'триллер',
            'code' => 'triller'
        ],
        [
            'name' => 'ужасы',
            'code' => 'horror'
        ],
        [
            'name' => 'фэнтези',
            'code' => 'fantasy'
        ],
        [
            'name' => 'фантастика',
            'code' => 'fantastic'
        ],
      ]
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
