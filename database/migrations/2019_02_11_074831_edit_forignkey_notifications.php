<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditForignkeyNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notifications_de_foreign');
            $table->dropForeign('notifications_para_foreign');
            $table->dropForeign('notifications_aseo_id_foreign');
            $table->dropForeign('notifications_comentario_id_foreign');

            $table->foreign('de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('para')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aseo_id')->references('id')->on('aseos')->onDelete('cascade');
            $table->foreign('comentario_id')->references('id')->on('comentarios')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
