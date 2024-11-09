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
            UsersSeeder::class,
            MasterKodeAkunSeeder::class,
            MasterProdukSeeder::class,
            MasterOpsiPembayaranSeeder::class,
            MasterCustomerSeeder::class,
            MasterSupplierSeeder::class,
            PembelianSeeder::class,
            PembelianDetailSeeder::class,
            KasKeluarSeeder::class,
            PenjualanSeeder::class,
            PenjualanDetailSeeder::class,
            KasMasukSeeder::class,
            KasKeluarSeeder::class,
        ]);

    }
}
