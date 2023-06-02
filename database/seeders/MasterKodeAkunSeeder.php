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
                'kode_kategori' => '100',
                'nama_kategori' => 'KAS',
            ],[
                'kode_kategori' => '101',
                'nama_kategori' => 'KSA',
            ],[
                'kode_kategori' => '102',
                'nama_kategori' => 'Bank Jatim',
            ],[
                'kode_kategori' => '103',
                'nama_kategori' => 'BCA',
            ],[
                'kode_kategori' => '104',
                'nama_kategori' => 'Hutang Tunai',
            ],[
                'kode_kategori' => '105',
                'nama_kategori' => 'Hutang Usaha',
            ],[
                'kode_kategori' => '106',
                'nama_kategori' => 'Hutang Lain-Lain',
            ],[
                'kode_kategori' => '107',
                'nama_kategori' => 'Hutang Saham',
            ],[
                'kode_kategori' => '250',
                'nama_kategori' => 'Uang Muka',
            ],[
                'kode_kategori' => '122',
                'nama_kategori' => 'Piutang Usaha',
            ],[
                'kode_kategori' => '125',
                'nama_kategori' => 'Piutang Karyawan',
            ],[
                'kode_kategori' => '126',
                'nama_kategori' => 'Piutang Lain-Lain',
            ],[
                'kode_kategori' => '140',
                'nama_kategori' => 'Inventaris',
            ],[
                'kode_kategori' => '151',
                'nama_kategori' => 'Bahan Baku',
            ],[
                'kode_kategori' => '152',
                'nama_kategori' => 'Bahan Penolong',
            ],[
                'kode_kategori' => '153',
                'nama_kategori' => 'Bahan Pembersih',
            ],[
                'kode_kategori' => '620',
                'nama_kategori' => 'Biaya Komisi',
            ],[
                'kode_kategori' => '640',
                'nama_kategori' => 'Biaya Promosi',
            ],[
                'kode_kategori' => '700',
                'nama_kategori' => 'Biaya Lembur',
            ],[
                'kode_kategori' => '701',
                'nama_kategori' => 'Biaya Gaji',
            ],[
                'kode_kategori' => '702',
                'nama_kategori' => 'Biaya Konsumsi',
            ],[
                'kode_kategori' => '703',
                'nama_kategori' => 'Biaya Perbaikan Kendaraan',
            ],[
                'kode_kategori' => '703.1',
                'nama_kategori' => 'Biaya Perbaikan Mesin',
            ],[
                'kode_kategori' => '703.2',
                'nama_kategori' => 'Biaya Perbaikan Bangunan',
            ],[
                'kode_kategori' => '704',
                'nama_kategori' => 'Biaya Transportasi',
            ],[
                'kode_kategori' => '705',
                'nama_kategori' => 'Biaya L.A.T',
            ],[
                'kode_kategori' => '707',
                'nama_kategori' => 'Biaya Kantor',
            ],[
                'kode_kategori' => '709',
                'nama_kategori' => 'Biaya Produksi',
            ],[
                'kode_kategori' => '710',
                'nama_kategori' => 'Biaya Kirim',
            ],[
                'kode_kategori' => '712',
                'nama_kategori' => 'Biaya Lain-Lain',
            ],[
                'kode_kategori' => '713',
                'nama_kategori' => 'Solar Pajak',
            ],[
                'kode_kategori' => '715',
                'nama_kategori' => 'Pendapatan Peralatan',
            ],[
                'kode_kategori' => '716',
                'nama_kategori' => 'Solar Genset',
            ],[
                'kode_kategori' => '717',
                'nama_kategori' => 'Pendapatan Lain-Lain',
            ],
        ];
        foreach ($akun as $key => $value){
            KodeAkun::create($value);
        }
    }
}
