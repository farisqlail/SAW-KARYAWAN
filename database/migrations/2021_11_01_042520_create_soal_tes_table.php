<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tes', function (Blueprint $table) {
            $table->increments('id_soal_tes');
            $table->unsignedInteger('id_jadwal_tes')->index()->nullable();
            $table->unsignedInteger('id_soal')->index()->nullable();
            $table->timestamps();
            $table->foreign('id_jadwal_tes')
            ->references('id_jadwal_tes')
            ->on('jadwal_tes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_soal')
            ->references('id_soal')
            ->on('daftar_soal')
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
        Schema::dropIfExists('soal_tes');
    }
}
