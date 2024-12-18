<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    public function kategori()
    {
        return $this->belongsTo(KategoriPelapor::class, 'kategori_id');
    }
    public function instansi()
    {
        return $this->belongsTo(KategoriInstansi::class, 'kategori_instansi_id');
    }
    public function subjek_laporan()
    {
        return $this->belongsTo(SubjekLaporan::class, 'subjek_id');
    }
}
