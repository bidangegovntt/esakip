<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePejabatSubbidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat_subbidangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip', 50);
            $table->string('nama', 50);
            $table->tinyInteger('opd_id');
            $table->tinyInteger('bidang_id');
            $table->tinyInteger('subbidang_id');
            $table->tinyInteger('jabatan_id');
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
        Schema::dropIfExists('pejabat_subbidangs');
    }
}
