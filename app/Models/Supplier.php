<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $tablle = 'suppliers';
    protected $fillable = ['nama_supplier', 'alamat', 'telepon'];
    public function suplier_produks()
    {
        return $this->hasMany(Produk_supplier::class);
    }

}
