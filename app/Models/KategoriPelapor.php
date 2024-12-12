<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelapor extends Model
{
    use HasFactory;
    public function instansi()
    {
        return $this->hasMany(KategoriInstansi::class);
    }
}
