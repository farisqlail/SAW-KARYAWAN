<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tes', function (Blueprint $table) {
            $table->bigIncrements('id_hasil_tes');
            $table->unsignedBigInteger('id_soal')->index()->nullable();
            $table->unsignedBigInteger('id_pelamar')->index()->nullable();
            $table->string('jawaban');
            $table->integer('nilai');
            $table->timestamps(); 
            $table->foreign('id_soal')
            ->references('id_soal')
            ->on('daftar_soal')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_pelamar')
            ->references('id_pelamar')
            ->on('pelamar')
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
        Schema::dropIfExists('hasil_tes');
    }
}
