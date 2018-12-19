<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('aseo_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign('comentarios_user_id_foreign');
            $table->dropForeign('comentarios_aseo_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('aseo_id');
        });

    }
}
