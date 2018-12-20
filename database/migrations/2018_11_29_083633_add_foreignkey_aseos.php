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
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
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
            $table->dropForeign('aseos_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
