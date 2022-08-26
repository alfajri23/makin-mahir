<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_templates', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('link')->nullable();
            $table->string('harga')->nullable();
            $table->string('harga_bias')->nullable();
            $table->string('poster')->nullable();
            $table->string('desc')->nullable();
            $table->string('file')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('templates');
    }
}
