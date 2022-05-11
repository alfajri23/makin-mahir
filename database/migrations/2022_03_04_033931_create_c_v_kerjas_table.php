<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_kerjas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('alamat')->nullable();
            $table->string('posisi')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->date('mulai')->nullable();
            $table->date('akhir')->nullable();
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
        Schema::dropIfExists('c_v_kerjas');
    }
}
