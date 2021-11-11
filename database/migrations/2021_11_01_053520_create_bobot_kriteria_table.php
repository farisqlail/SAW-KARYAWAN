<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->increments('id_bobot_kriteria');
            $table->unsignedInteger('id_kriteria')->index()->nullable();
            $table->string('nama_bobot');
            $table->integer('jumlah_bobot');
            $table->timestamps();
            $table->foreign('id_kriteria')
            ->references('id_kriteria')
            ->on('kriteria')
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
        Schema::dropIfExists('bobot_kriteria');
    }
}
