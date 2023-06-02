<?php

namespace Database\Seeders;
use App\Models\Customer;

use Illuminate\Database\Seeder;

class MasterCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = [
            [
                'id' => '1',
                'nama_pelanggan' => 'Klinik Edifuz',
                'alamat_pelanggan' => 'Jl. Kapten Suwandak No.50, Ditotrunan, Kec. Lumajang, Kab. Lumajang',
                'telepon_pelanggan' => '082121300100',
            ],[
                'id' => '2',
                'nama_pelanggan' => 'SMK Muhammadiyah',
                'alamat_pelanggan' => 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang',
                'telepon_pelanggan' => '(0334) 890222',
            ],[
                'id' => '3',
                'nama_pelanggan' => 'RSUD Pasirian',
                'alamat_pelanggan' => 'Jl. Raya Pasirian No.225A, Kebonan, Pasirian, Kec. Pasirian, Kabupaten Lumajang',
                'telepon_pelanggan' => '(0334) 5761114',
            ],[
                'id' => '4',
                'nama_pelanggan' => 'RS. Bhayangkara',
                'alamat_pelanggan' => 'Jl. Kapten Kyai Ilyas No.7, Tompokersan, Kec. Lumajang, Kabupaten Lumajang',
                'telepon_pelanggan' => '(0334) 881646',
            ],[
                'id' => '5',
                'nama_pelanggan' => 'RS. Muhammadiyah',
                'alamat_pelanggan' => 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang',
                'telepon_pelanggan' => '(0334) 8782955',
            ],[
                'id' => '6',
                'nama_pelanggan' => 'Dinas Kesehatan Lumajang',
                'alamat_pelanggan' => 'Jl. Jend. S. Parman No.13, Rogotrunan, Kec. Lumajang, Kabupaten Lumajang',
                'telepon_pelanggan' => '(0334) 881066',
            ],[
                'id' => '7',
                'nama_pelanggan' => 'SMK Negeri 1 Lumajang',
                'alamat_pelanggan' => 'Jl. H. O.S. Cokroaminoto No.161, Tompokersan, Kec. Lumajang',
                'telepon_pelanggan' => '(0334) 881866',
            ],[
                'id' => '8',
                'nama_pelanggan' => 'Firdan',
                'alamat_pelanggan' => 'Lumajang',
                'telepon_pelanggan' => '085284070404',
            ],[
                'id' => '9',
                'nama_pelanggan' => 'Mahendra',
                'alamat_pelanggan' => 'Lumajang',
                'telepon_pelanggan' => '085284070404',
            ],
        ];

        foreach ($customer as $key => $value){
            Customer::create($value);
        }
    }
}
