<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_customer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->text('alamat_pelanggan');
            $table->string('telepon_pelanggan');
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
        Schema::dropIfExists('mst_customer');
    }
}
