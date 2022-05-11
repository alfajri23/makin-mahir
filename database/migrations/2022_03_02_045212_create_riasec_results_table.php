<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiasecResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riasec_results', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('member')->nullable();
            $table->integer('R')->nullable();
            $table->integer('I')->nullable();
            $table->integer('A')->nullable();
            $table->integer('S')->nullable();
            $table->integer('E')->nullable();
            $table->integer('C')->nullable();
            $table->string('result')->nullable();
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
        Schema::dropIfExists('riasec_results');
    }
}
