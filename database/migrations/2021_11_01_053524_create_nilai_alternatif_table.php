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
            $table->increments('id_nilai_alternatif');
            $table->unsignedInteger('id_pelamar')->index()->nullable();
            $table->unsignedInteger('id_bobot_kriteria')->index()->nullable();
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
