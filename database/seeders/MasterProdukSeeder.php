<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class MasterProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bahan = [
            [
                'id_produk' => '1',
                'kode_produk' => 'FRONT280',
                'nama_produk' => 'Fronlite 280',
                'ukuran_produk' => 'meter',
                'harga_produk' => '17500',
                'type_produk' => 'meter',
            ],[
                'id_produk' => '2',
                'kode_produk' => 'BC001',
                'nama_produk' => 'BC',
                'ukuran_produk' => 'A3',
                'harga_produk' => '5000',
                'type_produk' => 'qty',
            ],[
                'id_produk' => '3',
                'kode_produk' => 'Dup350',
                'nama_produk' => 'Duplex',
                'ukuran_produk' => 'A3',
                'harga_produk' => '5000',
                'type_produk' => 'qty',
            ],[
                'id_produk' => '4',
                'kode_produk' => 'Ap160',
                'nama_produk' => 'Art Paper',
                'ukuran_produk' => 'A3',
                'harga_produk' => '5000',
                'type_produk' => 'qty',
            ],[
                'id_produk' => '5',
                'kode_produk' => 'HVS70',
                'nama_produk' => 'HVS',
                'ukuran_produk' => 'A3',
                'harga_produk' => '5000',
                'type_produk' => 'qty',
            ],[
                'id_produk' => '6',
                'kode_produk' => 'CSTM01',
                'nama_produk' => 'Custom Ofset',
                'ukuran_produk' => 'custom',
                'harga_produk' => '5000',
                'type_produk' => 'qty',
            ]
        ];

        foreach ($bahan as $key => $value){
            Produk::create($value);
        }
    }
}
