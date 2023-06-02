<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpsiPembayaran;

class MasterOpsiPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = [
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

        foreach ($option as $key => $value){
            OpsiPembayaran::create($value);
        }
    }
}
