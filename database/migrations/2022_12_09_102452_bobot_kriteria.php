<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BobotKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kriteria')->index()->unsigned()->nullable();
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade');
            $table->string('nama_bobot');
            $table->double('jumlah_bobot')->default(0);
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
