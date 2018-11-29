<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReportesAseos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_aseos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aseo_id');
            $table->string('tipo');
            $table->string('comentario')->nullable();
            $table->timestamps();

            $table->foreign('aseo_id')
              ->references('id')->on('aseos')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_aseos');
    }
}
