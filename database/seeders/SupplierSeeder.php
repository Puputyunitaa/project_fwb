<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('suppliers')->insert([
            ['name' => 'PT Elektronik Jaya', 'phone' => '021999888', 'address' => 'Jakarta'],
            ['name' => 'CV Pakaian Nusantara', 'phone' => '022123456', 'address' => 'Bandung'],
            ['name' => 'Toko Alat Tulis Sejahtera', 'phone' => '031444222', 'address' => 'Surabaya'],
        ]);
    }
}
