<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('link')->nullable();
            $table->string('jenis')->nullable();
            $table->string('tipe')->nullable();
            $table->integer('id_user')->nullable();
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
        Schema::dropIfExists('notifikasi_users');
    }
}
