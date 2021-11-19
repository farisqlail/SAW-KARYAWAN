<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_tes', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_tes');
            $table->unsignedBigInteger('id_lowongan')->index()->nullable();
            $table->dateTime('tanggal');
            $table->dateTime('durasi_tes');
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
        Schema::dropIfExists('jadwal_tes');
    }
}
