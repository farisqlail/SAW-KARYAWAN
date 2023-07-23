<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailJawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jawaban', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_daftar_soal')->index()->unsigned()->nullable();
            $table->string('jawaban');
            $table->boolean('isTrue');
            $table->string('urutan')->nullable();
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
