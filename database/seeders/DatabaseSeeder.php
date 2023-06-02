<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SettingTableSeeder::class,
            Users::class,
            MasterKodeAkunSeeder::class,
            MasterOpsiPembayaranSeeder::class,
            MasterCustomerSeeder::class,
            MasterSupplierSeeder::class,
            PembelianSeeder::class,
            PembelianDetailSeeder::class,
            KasKeluarSeeder::class,
            PenjualanSeeder::class,
            PenjualanDetailSeeder::class,
            KasMasukSeeder::class,
        ]);

    }
}
