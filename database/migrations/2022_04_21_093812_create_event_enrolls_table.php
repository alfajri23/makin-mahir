<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_expert')->nullable();
            $table->integer('id_event');
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
        Schema::dropIfExists('event_enrolls');
    }
}
