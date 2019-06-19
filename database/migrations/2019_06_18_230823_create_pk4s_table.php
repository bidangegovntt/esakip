<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePk4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk4s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('tahun')->nullable()->default(12);
            $table->tinyInteger('opd_id');
            $table->tinyInteger('bidang_id');
            $table->tinyInteger('subbidang_id');
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
        Schema::dropIfExists('pk4s');
    }
}
