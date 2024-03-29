<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->index()->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_lowongan')->index()->unsigned()->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->string('nama_pelamar');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('jenis_kelamin');
            $table->string('cv');
            $table->string('ijazah');
            $table->string('pas_foto');
            $table->string('seleksi_satu')->nullable();
            $table->string('seleksi_dua')->nullable();
            $table->string('catatan_seleksi_satu')->nullable();
            $table->string('status_wawancara')->nullable();
            $table->string('hasil_wawancara')->nullable();
            $table->string('status_dokumen')->nullable();
            $table->string('keterangan_psikotes')->nullable();
            $table->integer('nilai_tes')->nullable();
            $table->string('rangked')->nullable();
            $table->integer('nilai_akhir')->nullable();
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
