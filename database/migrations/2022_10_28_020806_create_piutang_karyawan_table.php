<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiutangKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutang_karyawan', function (Blueprint $table) {
            $table->increments('id_piutang_karyawan');
            $table->date('tgl_pengajuan');
            $table->unsignedBigInteger('id_karyawan');
            $table->foreign('id_karyawan')
                ->references('id')
                ->on('mst_data_karyawan')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('keterangan');
            $table->integer('saldo');
            $table->string('status')->default('pending');
            $table->integer('total_pitang');
            $table->integer('total_terbayar');
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
        Schema::dropIfExists('piutang_karyawan');
    }
}
