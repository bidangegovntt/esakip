<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpkIndikatorProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppk_indikator_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('ppk_program_id')->nullable()->default(12);
            $table->string('nomor_urut', 100)->nullable()->default('text');
            $table->string('kegiatan', 100)->nullable()->default('text');
            $table->string('indikator_kegiatan', 100)->nullable()->default('text');
            $table->string('target_kegiatan', 100)->nullable()->default('text');
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
        Schema::dropIfExists('ppk_indikator_programs');
    }
}
