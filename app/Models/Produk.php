<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $guarded = [];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);


    }
    public function suplier_produks()
    {
        return $this->hasMany(Produk_supplier::class);
    }
}
