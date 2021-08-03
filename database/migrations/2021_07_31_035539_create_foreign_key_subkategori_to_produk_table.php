<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeySubkategoriToProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->unsignedInteger('id_subkategori')->change();
            $table->foreign('id_subkategori')
                  ->references('id_subkategori')
                  ->on('subkategori')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            $table->unsignedInteger('id_supplier')->change();
            $table->foreign('id_supplier')
                  ->references('id_supplier')
                  ->on('supplier')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->integer('id_subkategori')->change();
            $table->dropForeign('produk_id_subkategori_foreign');
            $table->integer('id_supplier')->change();
            $table->dropForeign('produk_id_supplier_foreign');
        });
    }
}
