<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalTes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_tes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lowongan')->index()->unsigned()->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->date('tanggal_notif');
            $table->date('tanggal');
            $table->date('durasi_tes');
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
