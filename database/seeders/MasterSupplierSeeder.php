<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class MasterSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = [
            [
                'id' => '1',
                'nama_supplier' => 'Alea Grafika',
                'alamat_supplier' => 'Jl. Raya Tenggilis Mejoyo Blk. E - 7, Tenggilis Mejoyo, Surabaya',
                'telepon_supplier' => '(031) 8477784',
            ],[
                'id' => '2',
                'nama_supplier' => 'Aneka Binding',
                'alamat_supplier' => 'Jl. Sidosermo V No.65, Sidosermo, Kec. Wonocolo, Surabaya',
                'telepon_supplier' => '081553161358',
            ],[
                'id' => '3',
                'nama_supplier' => 'Aneka Jaya Perkasa',
                'alamat_supplier' => 'Jl. Wijaya Kusuma No.78, Ditotrunan, Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '4',
                'nama_supplier' => 'Aneka Vita',
                'alamat_supplier' => 'Jalan Jenderal Sudirman No.188-G, Tompokersan, Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '5',
                'nama_supplier' => 'ColorLink',
                'alamat_supplier' => 'Jl. Satsui Tubun No.8 F, Gadang, Kec. Sukun, Kota Malang',
                'telepon_supplier' => '-',
            ],[
                'id' => '6',
                'nama_supplier' => 'Golden Grafika',
                'alamat_supplier' => 'Taman indah regency, Geluran, Kec. Taman, Kabupaten Sidoarjo',
                'telepon_supplier' => '-',
            ],[
                'id' => '7',
                'nama_supplier' => 'Makmur Jaya Usaha',
                'alamat_supplier' => 'Jl. Kembang Jepun 110. SURABAYA',
                'telepon_supplier' => '-',
            ],[
                'id' => '8',
                'nama_supplier' => 'Megah Baru Jember',
                'alamat_supplier' => 'Jl. PB Sudirman No.22, Wetan Ktr., Jemberlor, Kec. Patrang, Kabupaten Jember',
                'telepon_supplier' => '-',
            ],[
                'id' => '9',
                'nama_supplier' => 'P. Taufik',
                'alamat_supplier' => 'Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '10',
                'nama_supplier' => 'PT. Bintang Cakra Kencana',
                'alamat_supplier' => 'Jl. Ahmad Yani No.48, Ketintang, Kec. Gayungan, Surabaya',
                'telepon_supplier' => '-',
            ],[
                'id' => '11',
                'nama_supplier' => 'PT. Binter Jet',
                'alamat_supplier' => 'Jl. Wiratno 7B, Kenjeran, Surabaya',
                'telepon_supplier' => '-',
            ],[
                'id' => '12',
                'nama_supplier' => 'Ryo Kertas',
                'alamat_supplier' => 'Ruko Perumahan Pesona Alam No. 01, Jl. Soekarno Hatta, Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '13',
                'nama_supplier' => 'Santana Citra Perkasa',
                'alamat_supplier' => 'JL. Margomulyo Permai, Blok E/22, Greges, Surabaya',
                'telepon_supplier' => '-',
            ],[
                'id' => '14',
                'nama_supplier' => 'Setia Kawan',
                'alamat_supplier' => 'Jl. Semeru No.124, Citrodiwangsan, Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '15',
                'nama_supplier' => 'Sinar Ilmu',
                'alamat_supplier' => 'Jl. Abu Bakar No.06, Citrodiwangsan, Kec. Lumajang',
                'telepon_supplier' => '08116758550',
            ],[
                'id' => '16',
                'nama_supplier' => 'Tk.  Minaret',
                'alamat_supplier' => 'Jl. Jendral Panjaitan No.71, Citrodiwangsan, Kec. Lumajang',
                'telepon_supplier' => '-',
            ],[
                'id' => '17',
                'nama_supplier' => 'UD Efod Jaya Abadi',
                'alamat_supplier' => 'JL. Tropodo 1, No. 225, Sidoarjo',
                'telepon_supplier' => '-',
            ],[
                'id' => '18',
                'nama_supplier' => 'Vicentra',
                'alamat_supplier' => 'Jl. Rungkut Asri Utara XIX No.93, Kali Rungkut, Kec. Rungkut, Surabaya',
                'telepon_supplier' => '085733399974',
            ],[
                'id' => '19',
                'nama_supplier' => 'PT. Mahkota Rajin Setia',
                'alamat_supplier' => 'JL. Rungkut Industri III/71, Surabaya',
                'telepon_supplier' => '031-8411177',
            ],[
                'id' => '20',
                'nama_supplier' => 'SPBU',
                'alamat_supplier' => 'Lumajang',
                'telepon_supplier' => '1',
            ],[
                'id' => '21',
                'nama_supplier' => 'Ravi',
                'alamat_supplier' => 'Lumajang',
                'telepon_supplier' => '1',
            ]
        ];

        foreach ($supplier as $key => $value){
            Supplier::create($value);
        }
    }
}
