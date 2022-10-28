<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiutangKaryawanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutang_karyawan_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_piutang_karyawan');
            $table->foreign('id_piutang_karyawan')
                ->references('id_piutang_karyawan')
                ->on('piutang_karyawan')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('keterangan');
            $table->integer('debit');
            $table->integer('kredit');
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
        Schema::dropIfExists('piutang_karyawan_detail');
    }
}
