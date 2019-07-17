<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapaianLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('capaian_id')->unsigned()->nullable();
            $table->integer('tahun')->unsigned()->nullable();
            $table->string('sasaran', 100)->nullable();
            $table->string('iku', 100)->nullable();
            $table->string('satuan', 100)->nullable();
            $table->integer('target')->unsigned()->nullable();
            $table->integer('realisasi')->unsigned()->nullable();
            $table->integer('rencana_anggaran')->unsigned()->nullable();
            $table->integer('realisasi_anggaran')->unsigned()->nullable();
            $table->integer('capaian')->unsigned()->nullable();
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
        Schema::dropIfExists('capaian_layouts');
    }
}
