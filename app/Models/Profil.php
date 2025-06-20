<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['user_id', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
