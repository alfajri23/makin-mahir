<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbtiQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_questions', function (Blueprint $table) {
            $table->id();
            $table->enum('categori',['decision','orientation','energy','information'])->nullable();
            $table->string('type_1')->nullable();
            $table->string('type_2')->nullable();
            $table->string('question')->nullable();
            $table->string('statement_1')->nullable();
            $table->string('statement_2')->nullable();
            $table->date('date');
            $table->enum('publish',['1','0'])->nullable();
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
        Schema::dropIfExists('mbti_questions');
    }
}
