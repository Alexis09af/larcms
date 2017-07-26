<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnadirContadorVisitasPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lc_posts', function(Blueprint $table){
            $table->integer('contador_visitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lc_posts', function(Blueprint $table){
              $table->dropColumn('contador_visitas');
        });
        }
    }
