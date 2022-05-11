<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVEdukasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_edukasis', function (Blueprint $table) {
            $table->id();
            $table->year('masuk');
            $table->year('keluar');
            $table->string('alamat')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('gpa')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('c_v_edukasis');
    }
}
