<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    Protected $table = 'kategoris';
    protected $guarded = [];
    public function Produk(){
        return $this->hasMany(Produk::class);
    }
}
