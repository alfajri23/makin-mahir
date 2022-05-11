<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('organisasi')->nullable();
            $table->string('posisi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->date('mulai')->nullable();
            $table->date('akhir')->nullable();
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
        Schema::dropIfExists('c_v_organisasis');
    }
}
