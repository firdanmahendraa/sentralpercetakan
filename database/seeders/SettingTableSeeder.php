<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id' => 1,
            'nama_perusahaan' => 'Sentral Percetakan',
            'alamat' => 'Jl. Jendral Panjaitan 72 - Lumajang',
            'telepon' => '085284070404',
            'logo_aplikasi' => 'assets/img/brand_icon.png',
            'logo_login' => 'assets/img/logo.png',
            'logo_login' => 'assets/img/bg_login.png',
            'logo_nota' => 'assets/img/nota_logo.png',
        ]);
    }
}
