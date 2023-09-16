<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananPerkara2 extends Model
{
    protected $table = 'penanganan_perkara2s'; // Sesuaikan dengan nama tabel yang sesuai
    protected $fillable = [
        'satker_id',
        'uraian_kasus',
        'tersangka',
        'barang_bukti',
        'lidik',
        'sidik',
        'sp3',
        'p21',
        'vonis',
        'keterangan',
    ];
    public function PenangananPerkara()
    {
        return $this->morphOne(PenangananPerkara::class, 'penanganan');
    }
}
