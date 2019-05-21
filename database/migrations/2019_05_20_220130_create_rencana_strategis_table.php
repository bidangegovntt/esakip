<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanaStrategisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_strategis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('opd_id');
            $table->integer('tahun');
            $table->text('tujuan')->nullable();
            $table->text('sasaran')->nullable();
            $table->text('indikator_kinerja')->nullable();
            $table->text('awal')->nullable();
            $table->text('perubahan')->nullable();
            $table->timestamps();
            $table->softDeletes(); // deleted_at
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
        Schema::dropIfExists('rencana_strategis');
    }
}
