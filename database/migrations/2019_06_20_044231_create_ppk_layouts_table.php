<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpkLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppk_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('ppk_id')->nullable()->default(12);
            $table->smallInteger('sasaran_id')->nullable()->default(12);
            $table->smallInteger('indikator_id')->nullable()->default(12);
            $table->string('pagu_anggaran', 100)->nullable()->default('text');
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
        Schema::dropIfExists('ppk_layouts');
    }
}
