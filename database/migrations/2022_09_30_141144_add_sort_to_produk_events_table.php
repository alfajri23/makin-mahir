<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortToProdukEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk_events', function (Blueprint $table) {
            $table->integer('sort')->nullable();
        });

        Schema::table('produk_konsultasis', function (Blueprint $table) {
            $table->integer('sort')->nullable();
        });

        Schema::table('produk_templates', function (Blueprint $table) {
            $table->integer('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk_events', function (Blueprint $table) {
            //
        });
    }
}
