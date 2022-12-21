<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
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
                'name' => 'Firdan Mahendra',
                'username' => 'owner',
                'password' => bcrypt('owner'),
                'levels' => 'Owner',
            ],
            [
                'name' => 'Novi',
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
