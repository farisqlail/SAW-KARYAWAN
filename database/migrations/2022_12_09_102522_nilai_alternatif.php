<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NilaiAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelamar')->index()->unsigned()->nullable();
            $table->foreign('id_pelamar')->references('id')->on('pelamar')->onDelete('cascade');
            $table->bigInteger('id_bobot_kriteria')->index()->unsigned()->nullable();
            $table->foreign('id_bobot_kriteria')->references('id')->on('bobot_kriteria')->onDelete('cascade');
            $table->integer('nilai')->default(0);
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
