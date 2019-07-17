<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('tahun_awal')->nullable();
            $table->smallInteger('tahun_akhir')->nullable();
            $table->tinyInteger('opd_id');
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
        Schema::dropIfExists('capaians');
    }
}
