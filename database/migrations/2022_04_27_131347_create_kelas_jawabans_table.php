<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_jawabans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_soal');
            $table->integer('id_ujian');
            $table->integer('no');
            $table->string('jawaban');
            $table->enum('benar',[0,1]);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('kelas_jawabans');
    }
}
