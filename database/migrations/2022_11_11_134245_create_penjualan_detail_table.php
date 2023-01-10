<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_detail', function (Blueprint $table) {
            $table->increments('id_penjualan_detail');
            $table->integer('id_penjualan');
            $table->integer('id_produk');
            $table->string('nama_pesanan');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->string('ukuran');
            $table->double('ukuran_p')->nullable();
            $table->double('ukuran_l')->nullable();
            $table->enum('is_plong', ['yes', 'no'])->nullable()->default('no');
            $table->integer('finishing_plong_qty')->nullable();
            $table->integer('finishing_plong_harga')->nullable();
            $table->string('det_pesanan')->nullable();
            $table->integer('harga');
            $table->integer('sub_total');
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
        Schema::dropIfExists('penjualan_detail');
    }
}
