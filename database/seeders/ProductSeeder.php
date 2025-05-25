<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('products')->insert([
            ['name' => 'Kulkas', 'category_id' => 1, 'stock' => 10, 'price' => 3500000],
            ['name' => 'Kaos Polos', 'category_id' => 2, 'stock' => 100, 'price' => 50000],
            ['name' => 'Buku Tulis', 'category_id' => 3, 'stock' => 200, 'price' => 15000],
            ['name' => 'Meja Belajar', 'category_id' => 4, 'stock' => 15, 'price' => 450000],
            ['name' => 'Smart TV', 'category_id' => 1, 'stock' => 8, 'price' => 5200000],
            ['name' => 'Jaket Hoodie', 'category_id' => 2, 'stock' => 50, 'price' => 120000],
        ]);
    }
}
