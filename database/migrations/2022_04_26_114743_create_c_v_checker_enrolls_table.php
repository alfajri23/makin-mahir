<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVCheckerEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_checker_enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('cv_user');
            $table->string('cv_review');
            $table->text('keteragan_user');
            $table->text('review_expert');
            $table->integer('id_transaksi')->nullable();
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
        Schema::dropIfExists('c_v_checker_enrolls');
    }
}
