<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanaAnggaranLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_anggaran_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->smallInteger('rencana_anggaran_id')->nullable()->default(12);
            $table->smallInteger('sasaran_id')->nullable()->default(12);   
            $table->smallInteger('indikator_kinerja_id')->nullable()->default(12);       
            $table->string('program', 100)->nullable();
            $table->string('kegiatan', 100)->nullable();
            $table->string('indikator_kegiatan', 100)->nullable();
            $table->smallInteger('target')->nullable()->default(12);
            $table->string('satuan', 100)->nullable();
            $table->string('anggaran', 100);
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
        Schema::dropIfExists('rencana_anggaran_layouts');
    }
}
