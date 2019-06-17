<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjanjianKinerjaLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjian_kinerja_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('sasaran_id')->nullable()->default(12);
            $table->smallInteger('indikator_id')->nullable()->default(12);
            $table->smallInteger('target_kinerja')->nullable()->default(12);
            $table->string('tw', 10)->nullable()->default('text');
            $table->tinyInteger('target');
            $table->string('satuan', 10)->nullable()->default('text');
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
        Schema::dropIfExists('perjanjian_kinerja_layouts');
    }
}
