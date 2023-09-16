<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananPerkara1 extends Model
{
    use HasFactory;
    protected $table = 'penanganan_perkara1s'; // Sesuaikan dengan nama tabel yang sesuai
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
