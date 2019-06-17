<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjanjianKinerjaSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjian_kinerja_sasarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('perjanjian_kinerja_id')->nullable()->default(12);
            $table->text('deskripsi')->nullable()->default('text');
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
        Schema::dropIfExists('perjanjian_kinerja_sasarans');
    }
}
