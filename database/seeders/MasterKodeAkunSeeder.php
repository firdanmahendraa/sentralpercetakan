<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KodeAkun;

class MasterKodeAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [
            [
                'id' => '100',
                'nama_akun' => 'KAS',
            ],[
                'id' => '101',
                'nama_akun' => 'KSA',
            ],[
                'id' => '102',
                'nama_akun' => 'Bank Jatim',
            ],[
                'id' => '103',
                'nama_akun' => 'BCA',
            ],[
                'id' => '104',
                'nama_akun' => 'Hutang Tunai',
            ],[
                'id' => '105',
                'nama_akun' => 'Hutang Usaha',
            ],[
                'id' => '106',
                'nama_akun' => 'Hutang Lain-Lain',
            ],[
                'id' => '107',
                'nama_akun' => 'Hutang Saham',
            ],[
                'id' => '250',
                'nama_akun' => 'Uang Muka',
            ],[
                'id' => '122',
                'nama_akun' => 'Piutang Usaha',
            ],[
                'id' => '125',
                'nama_akun' => 'Piutang Karyawan',
            ],[
                'id' => '126',
                'nama_akun' => 'Piutang Lain-Lain',
            ],[
                'id' => '140',
                'nama_akun' => 'Inventaris',
            ],[
                'id' => '151',
                'nama_akun' => 'Bahan Baku',
            ],[
                'id' => '152',
                'nama_akun' => 'Bahan Penolong',
            ],[
                'id' => '153',
                'nama_akun' => 'Bahan Pembersih',
            ],[
                'id' => '620',
                'nama_akun' => 'Biaya Komisi',
            ],[
                'id' => '640',
                'nama_akun' => 'Biaya Promosi',
            ],[
                'id' => '700',
                'nama_akun' => 'Biaya Lembur',
            ],[
                'id' => '701',
                'nama_akun' => 'Biaya Gaji',
            ],[
                'id' => '702',
                'nama_akun' => 'Biaya Konsumsi',
            ],[
                'id' => '703',
                'nama_akun' => 'Biaya Perbaikan Kendaraan',
            ],[
                'id' => '703.1',
                'nama_akun' => 'Biaya Perbaikan Mesin',
            ],[
                'id' => '703.2',
                'nama_akun' => 'Biaya Perbaikan Bangunan',
            ],[
                'id' => '704',
                'nama_akun' => 'Biaya Transportasi',
            ],[
                'id' => '705',
                'nama_akun' => 'Biaya L.A.T',
            ],[
                'id' => '707',
                'nama_akun' => 'Biaya Kantor',
            ],[
                'id' => '709',
                'nama_akun' => 'Biaya Produksi',
            ],[
                'id' => '710',
                'nama_akun' => 'Biaya Kirim',
            ],[
                'id' => '712',
                'nama_akun' => 'Biaya Lain-Lain',
            ],[
                'id' => '713',
                'nama_akun' => 'Solar Pajak',
            ],[
                'id' => '715',
                'nama_akun' => 'Pendapatan Peralatan',
            ],[
                'id' => '716',
                'nama_akun' => 'Solar Genset',
            ],[
                'id' => '717',
                'nama_akun' => 'Pendapatan Lain-Lain',
            ],
        ];
        foreach ($akun as $key => $value){
            KodeAkun::create($value);
        }
    }
}
