<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk_supplier extends Model
{
    protected $table = 'product_supplier';
    protected $fillable = ['produk_id', 'supplier_id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
