<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penjualan = [
            [//Jan
                'id_penjualan' => '1',
                'no_nota' => 'NT23010001',
                'id_pelanggan' => '1',
                'acc_desain' => 'Faris',
                'total_harga' => '',
                'diskon' => '0',
                'harga_akhir' => '',
                'diterima' => '',
                'kembali' => '',
                'piutang' => '',
                'id_user' => '2',
                'keterangan' => '',
                'created_at' => '2023-01-03 04:11:58',
                'updated_at' => '2023-01-03 04:11:58',
            ],[
                'id_penjualan' => '2',
                'no_nota' => 'NT23010002',
                'id_pelanggan' => '1',
                'acc_desain' => 'Faris',
                'total_harga' => '',
                'diskon' => '0',
                'harga_akhir' => '',
                'diterima' => '',
                'kembali' => '',
                'piutang' => '',
                'id_user' => '2',
                'keterangan' => '',
                'created_at' => '2023-01-03 04:11:58',
                'updated_at' => '2023-01-03 04:11:58',
            ]
        ];

        foreach ($penjualan as $key => $value){
            Penjualan::create($value);
        }
    }
}
