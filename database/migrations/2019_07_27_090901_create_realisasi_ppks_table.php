<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisasiPpksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_ppks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('opd_id')->nullable();
            $table->smallInteger('tahun')->nullable();
            $table->smallInteger('sasaran_id')->nullable();
            $table->smallInteger('indikator_id')->nullable();
            $table->smallInteger('target_id')->nullable();
            $table->string('program', 100)->nullable();
            $table->string('kegiatan', 100)->nullable();
            $table->string('anggaran', 100)->nullable();
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
        Schema::dropIfExists('realisasi_ppks');
    }
}
