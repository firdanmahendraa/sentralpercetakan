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
            'nama_perusahaan' => 'ASAP',
            'alamat' => 'Jl. Jendral Panjaitan 72 - Lumajang',
            'telepon' => '085284070404',
            'logo_aplikasi' => 'assets/img/brand-icon.png',
            'logo_login' => 'assets/img/logo.png',
            'bg_login' => 'assets/img/bg_login.jpg',
            'logo_nota' => 'assets/img/nota-logo.png',
        ]);
    }
}
