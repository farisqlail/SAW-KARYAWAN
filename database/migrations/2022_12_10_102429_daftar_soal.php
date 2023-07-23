<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_soal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kriteria')->index()->unsigned()->nullable();
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade');
            $table->bigInteger('id_jadwal_tes')->index()->unsigned()->nullable();
            $table->foreign('id_jadwal_tes')->references('id')->on('jadwal_tes')->onDelete('cascade');
            $table->bigInteger('id_lowongan')->index()->unsigned()->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->string('soal')->nullable();
            $table->string('file_soal')->nullable();
            $table->integer('bobot_soal')->nullable();
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
