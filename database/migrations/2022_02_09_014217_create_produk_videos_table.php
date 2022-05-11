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
        Schema::create('produk_videos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('subjudul')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('pemateri')->nullable();
            $table->integer('id_pemateri')->nullable();
            $table->string('harga');
            $table->string('harga_promo')->nullable();
            $table->string('poster');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('produk_videos');
    }
}
