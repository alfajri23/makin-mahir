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
            $table->string('link')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->string('waktu');
            $table->text('deskripsi')->nullable();
            $table->integer('id_expert')->nullable();
            $table->text('pemateri')->nullable();
            $table->string('harga');
            $table->string('harga_bias')->nullable();
            $table->string('poster')->nullable();
            $table->string('grup_wa')->nullable();
            $table->integer('status')->default(1);
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
