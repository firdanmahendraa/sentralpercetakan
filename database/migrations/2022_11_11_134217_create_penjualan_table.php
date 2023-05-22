<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            $table->string('no_nota');
            $table->integer('id_pelanggan');
            $table->string('acc_desain');
            $table->integer('total_harga');
            $table->tinyInteger('diskon')->nullable();
            $table->integer('diterima');
            $table->integer('kembali');
            $table->integer('piutang');
            $table->integer('id_user');
            $table->integer('id_akun');
            $table->string('keterangan');
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
        Schema::dropIfExists('penjualan');
    }
}
