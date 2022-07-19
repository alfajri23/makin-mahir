<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('id_status')->nullable();
            $table->integer('id_kategori')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('lama_kelas')->nullable();
            $table->string('tentang')->nullable();
            $table->text('desc')->nullable();
            $table->text('point_produk')->nullable();   //point" yang akan dipelajari
            $table->string('poster');
            $table->string('harga');
            $table->string('harga_bias')->nullable();
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
        Schema::dropIfExists('produk_videos');
    }
}
