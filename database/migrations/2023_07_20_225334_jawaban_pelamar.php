<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JawabanPelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_pelamar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelamar')->index()->unsigned()->nullable();
            $table->bigInteger('id_detail_jawaban')->index()->unsigned()->nullable();
            $table->bigInteger('id_hasil_tes')->index()->unsigned()->nullable();
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
