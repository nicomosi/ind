<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Pokemon;
use App\Type;

class CreatePokemonTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pokemon_id')->unsigned();
            $table->foreign('pokemon_id')->references('id')->on('pokemon');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->timestamps();
            //+ LO DEL FOREIGN ES HARDCODEAR, PERO QUE OTRA FORMA HAY?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_type');
    }
}
