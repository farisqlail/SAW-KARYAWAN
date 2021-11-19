<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->bigIncrements('id_pelamar');
            $table->unsignedInteger('id_lowongan')->index()->nullable();
            $table->unsignedBigInteger('id_user')->index()->nullable();
            $table->string('nama_pelamar');
            $table->date('tanggal_lahir');
            $table->string('no_telepon');
            $table->string('jenis_kelamin');
            $table->string('cv');
            $table->string('ijazah');
            $table->string('pas_foto');
            $table->integer('status_lamaran')->nullable();
            $table->timestamps();
            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('pelamar');
    }
}
