<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisasiKinerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_kinerjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('indikator_kinerja_id')->nullable()->default(12);
            $table->string('tw', 100)->nullable();
            $table->smallInteger('target')->nullable()->default(12);
            $table->smallInteger('capaian')->nullable()->default(12);
            $table->string('hasil', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('lampiran', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_kinerjas');
    }
}
