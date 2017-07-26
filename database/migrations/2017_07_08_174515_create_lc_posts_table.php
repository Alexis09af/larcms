<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lc_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('titulo');
            $table->string('slug',250)->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->string('image');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('lc_categorias')->onDelete('restrict');
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
        Schema::dropIfExists('lc_posts');
    }
}
