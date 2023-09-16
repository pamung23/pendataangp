<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKarhut4 extends Model
{
    use HasFactory;
    protected $table = 'tenaga_karhut4s'; // Sesuaikan dengan nama tabel yang telah Anda tentukan di migrasi
    protected $fillable = [
        'satker_id',
        'manggala_agni_pns',
        'manggala_agni_nonpns',
        'jumlah_regu',
        'mpa',
        'keterangan',
    ];
}
