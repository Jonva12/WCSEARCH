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
        Schema::table('aseos_users', function (Blueprint $table) {
            $table->unsignedInteger('aseo_id');
            $table->unsignedInteger('user_id')->nullable();

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
        Schema::table('aseos_users', function (Blueprint $table) {
            $table->dropForeign('aseos_users_aseo_id_foreign');
            $table->dropForeign('aseos_users_user_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('aseo_id');
        });
    }
}
