<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bkm', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penjualan')->nullable();
            $table->integer('id_kas_masuk')->nullable();
            $table->integer('id_akun');
            $table->string('uraian');
            $table->integer('debet');
            $table->string('opsi_pembayaran');
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
        Schema::dropIfExists('tb_bkm');
    }
}
