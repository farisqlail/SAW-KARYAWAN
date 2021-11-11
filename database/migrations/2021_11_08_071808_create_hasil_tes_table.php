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
            $table->increments('id_hasil_tes');
            $table->unsignedInteger('id_soal_tes')->index()->nullable();
            $table->unsignedInteger('id_pelamar')->index()->nullable();
            $table->string('jawaban');
            $table->integer('nilai');
            $table->timestamps();
            $table->foreign('id_soal_tes')
            ->references('id_soal_tes')
            ->on('soal_tes')
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
