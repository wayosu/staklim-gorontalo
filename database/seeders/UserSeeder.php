<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@staklim.com',
            'password' => bcrypt('admin123')
        ]);

        $admin->assignRole('admin');

        $kepalabidang = User::create([
            'name' => 'Kepala Bidang',
            'email' => 'kepalabidang@staklim.com',
            'password' => bcrypt('kepalabidang123')
        ]);

        $kepalabidang->assignRole('kepalabidang');

        $user = User::create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('user');
    }
}
