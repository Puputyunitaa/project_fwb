<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_supplier')->insert([
            ['product_id' => 1, 'supplier_id' => 1],
            ['product_id' => 2, 'supplier_id' => 2],
            ['product_id' => 3, 'supplier_id' => 3],
            ['product_id' => 4, 'supplier_id' => 1],
            ['product_id' => 5, 'supplier_id' => 1],
            ['product_id' => 6, 'supplier_id' => 2],
        ]);
    }
}
