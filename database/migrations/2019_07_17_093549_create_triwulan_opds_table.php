<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriwulanOpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triwulan_opds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun')->unsigned()->nullable();
            $table->integer('opd_id')->unsigned()->nullable();
            $table->integer('capaian_id')->unsigned()->nullable();
            $table->string('triwulan', 50)->nullable();
            $table->integer('jumlah_indikator')->unsigned()->nullable();
            $table->integer('tidak_tercapai')->unsigned()->nullable();
            $table->integer('kurang_tercapai')->unsigned()->nullable();
            $table->integer('tercapai')->unsigned()->nullable();
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
        Schema::dropIfExists('triwulan_opds');
    }
}
