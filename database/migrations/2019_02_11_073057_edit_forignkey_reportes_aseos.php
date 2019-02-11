<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditForignkeyReportesAseos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reportes_aseos', function (Blueprint $table) {
            $table->dropForeign('reportes_aseos_aseo_id_foreign');

            $table->foreign('aseo_id')->references('id')->on('aseos')->onDelete('cascade');
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
