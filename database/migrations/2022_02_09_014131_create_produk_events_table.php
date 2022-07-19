<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_events', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('judul');
            $table->date('tanggal');
            $table->string('waktu');
            $table->text('deskripsi')->nullable();
            $table->integer('id_expert')->nullable();
            $table->text('pemateri')->nullable();
            $table->string('harga');
            $table->string('harga_bias')->nullable();
            $table->string('poster')->nullable();
            $table->string('link')->nullable();
            $table->string('grup_wa')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('produk_events');
    }
}
