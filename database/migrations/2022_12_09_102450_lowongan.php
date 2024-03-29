<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lowongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->index()->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('posisi_lowongan');
            $table->date('berlaku_sampai');
            $table->text('deskripsi_pekerjaan');
            $table->text('deskripsi_persyaratan');
            $table->string('status_lowongan')->nullable();
            $table->string('status_approve')->nullable();
            $table->string('divisi')->nullable();
            $table->string('periode')->nullable();
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
