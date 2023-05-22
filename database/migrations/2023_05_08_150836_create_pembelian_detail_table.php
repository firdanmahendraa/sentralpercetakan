<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembelian');
            $table->integer('id_akun');
            $table->string('uraian');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('sub_total');
            $table->string('keterangan');
            $table->enum('status', ['pend','ok'])->default('pend');
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
        Schema::dropIfExists('pembelian_detail');
    }
}
