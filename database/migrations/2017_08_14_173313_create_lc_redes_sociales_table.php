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
            $table->string('fbLink')->nullable();

            $table->string('twtLink')->nullable();

            $table->string('gpLink')->nullable();

            $table->string('instaLink')->nullable();

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
