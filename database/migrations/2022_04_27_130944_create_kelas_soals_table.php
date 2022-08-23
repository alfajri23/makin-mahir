<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_kelas_soals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ujian')->nullable();
            $table->integer('no');
            $table->string('pertanyaan');
            $table->string('pilihanA');
            $table->string('pilihanB');
            $table->string('pilihanC');
            $table->string('pilihanD');
            $table->string('jawaban');
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
        Schema::dropIfExists('kelas_soals');
    }
}
