<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->unsignedInteger('id_aseo');
            $table->foreign('id_aseo')->references('id')->on('aseos')->onDelete('cascade');
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
        Schema::dropIfExists('table_comentarios');
    }
}
