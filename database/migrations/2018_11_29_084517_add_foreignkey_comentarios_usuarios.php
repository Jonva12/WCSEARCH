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
        Schema::table('comentarios_users', function (Blueprint $table) {
            $table->unsignedInteger('comentario_id');
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('comentarios_users', function (Blueprint $table) {
            $table->dropForeign('comentarios_users_comentario_id_foreign');
            $table->dropForeign('comentarios_users_user_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('comentario_id');
        });
    }
}
