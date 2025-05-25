<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'phone' => '08123456789',
                'address' => 'Alamat Admin'
            ],
            [
                'user_id' => 2,
                'phone' => '08123456788',
                'address' => 'Alamat Staf'
            ],
            [
                'user_id' => 3,
                'phone' => '08123456787',
                'address' => 'Alamat Supervisor'
            ]
        ]);
    }
}
