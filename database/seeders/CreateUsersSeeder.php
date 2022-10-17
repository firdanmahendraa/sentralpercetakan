<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Novitasari',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'levels' => 'Admin',
            ],
        ];

        foreach ($users as $key => $value){
            User::create($value);
        }
    }
}
