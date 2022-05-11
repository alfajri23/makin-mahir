<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingFormWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_form_webinars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul')->nullable();
            $table->integer('status')->default(1);
            $table->string('data')->nullable();
            $table->string('tipe')->nullable();
            $table->string('desc')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('setting_form_webinars');
    }
}
