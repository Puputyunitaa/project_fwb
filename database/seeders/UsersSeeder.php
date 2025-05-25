<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role_id' => 1, // Admin
            ],
            [
                'name' => 'Staf User',
                'email' => 'staf@gmail.com',
                'password' => Hash::make('staf'),
                'role_id' => 2, // Staf
            ],
            [
                'name' => 'Supervisor User',
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('supervisor'),
                'role_id' => 3, // Supervisor
            ],
        ]);
    }
}
