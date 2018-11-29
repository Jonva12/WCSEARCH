<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ValorarAseos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aseos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aseo_id');
            $table->unsignedInteger('usuario_id')->nullable();
            $table->integer('puntuacion');
            $table->timestamps();

            $table->foreign('aseo_id')->references('id')->on('aseos')->onDelete('cascade');
            $tabble->foreign('usuario_id')->refrences('id')->on('usuarios')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aseos_usuarios');
    }
}
