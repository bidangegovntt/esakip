<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePk4LayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk4_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('kegiatan_id')->nullable()->default(12);
            $table->smallInteger('indikator_id')->nullable()->default(12);
            $table->string('target', 50)->nullable()->default('text');
            $table->string('sasaran', 100)->nullable()->default('text');
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
        Schema::dropIfExists('pk4_layouts');
    }
}
