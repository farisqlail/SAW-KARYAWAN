<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HasilTes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_soal_tes')->index()->unsigned()->nullable();
            $table->foreign('id_soal_tes')->references('id')->on('daftar_soal')->onDelete('cascade');
            $table->bigInteger('id_pelamar')->index()->unsigned()->nullable();
            $table->foreign('id_pelamar')->references('id')->on('pelamar')->onDelete('cascade');
            $table->bigInteger('id_lowongan')->index()->unsigned()->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->bigInteger('id_bobot_kriteria')->index()->unsigned()->nullable();
            $table->foreign('id_bobot_kriteria')->references('id')->on('bobot_kriteria')->onDelete('cascade');
            $table->string('jawaban');
            $table->integer('nilai')->nullable();
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
