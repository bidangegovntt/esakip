<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpjmdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('tahun_awal')->nullable()->default(12);
            $table->smallInteger('tahun_akhir')->nullable()->default(12);
            $table->text('tujuan')->nullable()->default('text');
            $table->tinyInteger('sasaran_id');
            $table->tinyInteger('indikator_kinerja_id');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpjmds');
    }
}
