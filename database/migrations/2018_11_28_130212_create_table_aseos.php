<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAseos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aseos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('localizacion')->nullable();
            $table->string('dir');
            $table->time('horarioApertura')->nullable();
            $table->time('horarioCierre')->nullable();
            $table->boolean('horas24');
            $table->string('foto')->default('wc'); 
            $table->double('precio', 8, 2)->nullable();
            $table->boolean('accesibilidad');
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
        Schema::dropIfExists('aseos');
    }
}
