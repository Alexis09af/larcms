<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lc_redes_sociales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fbLink');
            $table->integer('fbCheck');

            $table->string('twtLink');
            $table->integer('twtCheck');

            $table->string('gpLink');
            $table->integer('gpCheck');

            $table->string('instaLink');
            $table->integer('instaCheck');

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
        Schema::dropIfExists('lc_redes_sociales');
    }
}
