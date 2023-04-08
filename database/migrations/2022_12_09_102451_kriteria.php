<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lowongan')->index()->unsigned()->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->string('nama_kriteria');
            $table->string('atribut_kriteria');
            $table->integer('bobot_preferensi');
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
        //
    }
}
