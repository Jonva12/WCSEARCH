<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToTableNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedInteger('de')->nullable();
            $table->unsignedInteger('para');
            $table->unsignedInteger('aseo_id')->nullable();
            $table->unsignedInteger('comentario_id')->nullable();

            $table->foreign('de')->references('id')->on('users');
            $table->foreign('para')->references('id')->on('users');
            $table->foreign('aseo_id')->references('id')->on('aseos');
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
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notifications_de_foreign');
            $table->dropForeign('notifications_para_foreign');
            $table->dropForeign('notifications_aseo_id_foreign');
            $table->dropForeign('notifications_comentario_id_foreign');

            $table->dropColumn('de');
            $table->dropColumn('para');
            $table->dropColumn('aseo_id');
            $table->dropColumn('comentario_id');
        });
    }
}
