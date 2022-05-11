<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk');
            $table->integer('id_member');
            $table->string('judul');
            $table->string('tipe');
            $table->string('metode');
            $table->string('nominal');
            $table->string('status');
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
        Schema::dropIfExists('data_pembayarans');
    }
}
