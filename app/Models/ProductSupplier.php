<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductSupplier extends Model
{
     use HasFactory;

    protected $table = 'product_supplier'; // pastikan nama tabel sesuai
    protected $fillable = ['product_id', 'supplier_id'];
    public $timestamps = true; // karena tabel kamu punya timestamps
}
