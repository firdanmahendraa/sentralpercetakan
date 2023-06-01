<?php

namespace Database\Seeders;
use App\Models\Penjualan;

use Illuminate\Database\Seeder;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penjualan = [
            [
                'opsi_pembayaran' => 'BCA',
                'nomor_rekening' => '123456',
                'atas_nama' => 'Firdan Mahendra',
            ],
            [
                'opsi_pembayaran' => 'Mandiri',
                'nomor_rekening' => '123456',
                'atas_nama' => 'Firdan Mahendra',
            ],
            [
                'opsi_pembayaran' => 'BRI',
                'nomor_rekening' => '123456',
                'atas_nama' => 'Firdan Mahendra',
            ],
        ];

        foreach ($penjualan as $key => $value){
            Penjualan::create($value);
        }
    }
}
