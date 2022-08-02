<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('public_key')->nullable();
            $table->integer('status')->default(0);
            $table->text('payment_methods')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('setting_pembayarans');
    }
}
