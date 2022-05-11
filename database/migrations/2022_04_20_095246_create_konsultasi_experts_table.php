<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi_experts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_expert');
            $table->integer('id_konsultasi');
            $table->string('nama')->nullable();
            $table->string('harga')->nullable();
            $table->string('waktu')->nullable();
            $table->text('jadwal')->nullable();
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
        Schema::dropIfExists('konsultasi_experts');
    }
}
