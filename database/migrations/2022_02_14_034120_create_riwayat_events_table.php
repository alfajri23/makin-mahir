<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_events', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')
                ->on('users')->onDelete('cascade');

            //$table->unsignedBigInteger('id_produk')->nullable();
            $table->integer('id_produk')->nullable();
            // $table->foreign('id')
            //     ->references('id')
            //     ->on('produk_events')->onDelete('cascade');

            $table->integer('id_konsul')->nullable();
            // $table->foreign('id')
            //     ->references('id')
            //     ->on('produk_konsuls')->onDelete('cascade');

            $table->string('tipe');
            $table->date('tanggal_beli');
            $table->string('harga')->nullable();
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
        Schema::dropIfExists('riwayat_events');
    }
}
