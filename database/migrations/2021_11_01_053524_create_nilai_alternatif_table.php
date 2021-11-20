<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->bigIncrements('id_nilai_alternatif');
            $table->bigInteger('id_bobot_kriteria')->unsigned()->nullable();
            $table->bigInteger('id_pelamar')->unsigned()->nullable();
//            $table->timestamps();
            $table->foreign('id_pelamar')
                ->references('id_pelamar')
                ->on('pelamar')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_bobot_kriteria')
                ->references('id_bobot_kriteria')
                ->on('bobot_kriteria')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternatif');
    }
}
