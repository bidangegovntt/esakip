<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjanjianKinerja2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjian_kinerja2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahun', 10)->nullable();
            $table->tinyInteger('opd_id');
            $table->string('file', 100)->nullable();
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
        Schema::dropIfExists('perjanjian_kinerja2s');
    }
}
