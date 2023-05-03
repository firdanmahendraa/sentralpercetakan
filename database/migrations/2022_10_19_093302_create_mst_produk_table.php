<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('ukuran_produk');
            $table->integer('harga_produk');
            $table->enum('type_produk', ['qty', 'meter']);
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
        Schema::dropIfExists('mst_produk');
    }
}
