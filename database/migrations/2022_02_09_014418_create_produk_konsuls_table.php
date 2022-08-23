<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukKonsulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('link');
            $table->string('tipe')->nullable();
            $table->string('jenis_konsultasi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->text('pemateri')->nullable();
            $table->integer('id_expert')->nullable();
            $table->string('harga');
            $table->string('harga_bias')->nullable();
            $table->string('poster');
            $table->string('video')->nullable();
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
        Schema::dropIfExists('produk_konsuls');
    }
}
