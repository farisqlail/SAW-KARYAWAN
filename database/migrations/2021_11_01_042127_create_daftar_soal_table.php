<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_soal', function (Blueprint $table) {
            $table->bigIncrements('id_soal');
            $table->unsignedBigInteger('id_jadwal_tes')->index()->nullable();
            $table->string('soal');
            $table->string('file_soal');
            $table->integer('bobot_soal');
            $table->timestamps();
            $table->foreign('id_jadwal_tes')
            ->references('id_jadwal_tes')
            ->on('jadwal_tes')
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
        Schema::dropIfExists('daftar_soal');
    }
}
