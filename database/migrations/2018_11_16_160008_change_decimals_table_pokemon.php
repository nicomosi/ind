<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDecimalsTablePokemon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            //
            $table->integer('weight')->change();
            $table->integer('height')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            //
            $table->decimal('weight', 6, 2)->change();
            $table->decimal('height', 6, 2)->change();
        });
    }
}
