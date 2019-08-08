<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIku2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iku2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('tahun_awal')->nullable();
            $table->smallInteger('tahun_akhir')->nullable();
            $table->tinyInteger('opd_id');
            $table->smallInteger('sasaran_id')->nullable();
            $table->smallInteger('indikator_id')->nullable();
            $table->text('penjelasan')->nullable();
            $table->string('penanggung_jawab', 100)->nullable();
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
        Schema::dropIfExists('iku2s');
    }
}
