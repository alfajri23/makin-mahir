<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_kelas_materis', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->integer('id_bab')->nullable();
            $table->integer('id_kelas')->nullable();
            $table->text('isi')->nullable();; //berisi list apa yang akan dipelajari
            $table->string('poster')->nullable();
            $table->string('link_video')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('kelas_materis');
    }
}
