<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->increments('id_kriteria');
            $table->unsignedInteger('id_lowongan')->index()->nullable();
            $table->string('nama_kriteria');
            $table->string('atribut_kriteria');
            $table->integer('bobot_preferensi');
            $table->timestamps();
            $table->foreign('id_lowongan')
            ->references('id_lowongan')
            ->on('lowongan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
