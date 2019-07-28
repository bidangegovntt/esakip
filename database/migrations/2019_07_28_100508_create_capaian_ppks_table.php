<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapaianPpksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_ppks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('opd_id')->nullable();
            $table->smallInteger('tahun')->nullable();
            $table->smallInteger('sasaran_id')->nullable();
            $table->smallInteger('rencana_ppk_id')->nullable();
            $table->smallInteger('realisasi_ppk_id')->nullable();
            $table->smallInteger('capaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capaian_ppks');
    }
}
