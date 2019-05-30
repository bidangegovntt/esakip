<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpjmdIndikatorKinerjaTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_indikator_kinerja_targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('rpjmd_id')->nullable()->default(12);
            $table->smallInteger('tahun')->nullable()->default(12);
            $table->tinyInteger('nilai');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
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
        Schema::dropIfExists('rpjmd_indikator_kinerja_targets');
    }
}
