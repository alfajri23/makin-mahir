<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_webinars', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_produk');
            $table->integer('umur');
            $table->string('info_event');
            $table->string('status');
            $table->string('telepon');
            $table->string('alasan');
            $table->string('gabung_grub')->nullable();
            $table->string('status_bayar')->nullable();
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
        Schema::dropIfExists('pendaftaran_webinars');
    }
}
