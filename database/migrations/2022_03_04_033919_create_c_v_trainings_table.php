<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_trainings', function (Blueprint $table) {
            $table->id();
            //$table->string('program')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('program')->nullable();
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
        Schema::dropIfExists('c_v_trainings');
    }
}
