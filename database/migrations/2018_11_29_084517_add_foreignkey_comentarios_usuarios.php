<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyComentariosUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comentarios_usuarios', function (Blueprint $table) {
            $table->unsignedInteger('comentario_id');
            $table->unsignedInteger('usuario_id')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('comentario_id')->references('id')->on('comentarios');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentarios_usuarios', function (Blueprint $table) {
            $table->dropForeign('comentarios_usuarios_comentario_id_foreign');
            $table->dropForeign('comentarios_usuarios_usuario_id_foreign');

            $table->dropColumn('usuario_id');
            $table->dropColumn('comentario_id');
        });
    }
}
