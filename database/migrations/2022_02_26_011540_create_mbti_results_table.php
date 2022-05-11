<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbtiResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_results', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('member')->nullable();
            $table->integer('I')->nullable();
            $table->integer('E')->nullable();
            $table->integer('T')->nullable();
            $table->integer('F')->nullable();
            $table->integer('S')->nullable();
            $table->integer('N')->nullable();
            $table->integer('J')->nullable();
            $table->integer('P')->nullable();
            $table->string('result')->nullable();
            //$table->string('note')->nullable();
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
        Schema::dropIfExists('mbti_results');
    }
}
