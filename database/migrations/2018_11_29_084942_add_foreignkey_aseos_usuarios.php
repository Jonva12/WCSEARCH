<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyAseosUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aseos_usuarios', function (Blueprint $table) {
            $table->unsignedInteger('aseo_id');
            $table->unsignedInteger('usuario_id')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('aseo_id')->references('id')->on('aseos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aseos_usuarios', function (Blueprint $table) {
            $table->dropForeign('aseos_usuarios_aseo_id_foreign');
            $table->dropForeign('aseos_usuarios_usuario_id_foreign');

            $table->dropColumn('usuario_id');
            $table->dropColumn('aseo_id');
        });
    }
}
