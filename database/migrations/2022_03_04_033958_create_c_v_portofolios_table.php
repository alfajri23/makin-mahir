<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVPortofoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('portofolio')->nullable();
            $table->string('url')->nullable();
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('c_v_portofolios');
    }
}
