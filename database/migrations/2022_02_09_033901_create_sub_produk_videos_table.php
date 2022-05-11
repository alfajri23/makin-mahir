<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProdukVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_produk_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk');
            $table->string('judul_sub');
            $table->string('judul');
            $table->string('durasi')->nullable();
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
        Schema::dropIfExists('sub_produk_videos');
    }
}
