<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyAseos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aseos', function (Blueprint $table) {
            $table->unsignedInteger('usuario_id')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aseos', function (Blueprint $table) {
            $table->dropForeign('comentarios_usuario_id_foreign');

            $table->dropColumn('usuario_id');
        });
    }
}
