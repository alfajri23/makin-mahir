<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranBeduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_beduks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_produk');
            $table->integer('umur');
            $table->string('info_event');
            $table->string('status');
            $table->string('telepon');
            $table->string('alasan');
            $table->string('gabung_grub');
            $table->string('bukti_subscribe');
            $table->string('reward')->nullable();
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
        Schema::dropIfExists('pendaftaran_beduks');
    }
}
