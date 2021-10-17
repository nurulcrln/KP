<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditNullablePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function (Blueprint $table) {
        $table->string('no_invoice')
              ->nullable()
              ->change();
        $table->date('date')
              ->nullable()
              ->change();
        $table->string('customer')
              ->nullable()
              ->change();
        $table->date('tenggat_waktu')
              ->nullable()
              ->change();
        $table->string('opsi_pembayaran')
              ->nullable()
              ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan', function (Blueprint $table) {
        $table->string('no_invoice')
              ->change();
        $table->date('date')
              ->change();
        $table->string('customer')
              ->change();
        $table->date('tenggat_waktu')
              ->change();
        $table->string('opsi_pembayaran')
              ->change();
        });
    }
}
