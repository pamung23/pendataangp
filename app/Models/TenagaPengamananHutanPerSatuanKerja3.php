<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPengamananHutanPerSatuanKerja3 extends Model
{
    use HasFactory;
    protected $table = 'tenaga_pengamanan_hutan_per_satuan_kerja3'; // Nama tabel sesuai dengan nama tabel di database

    protected $fillable = [
        'satker_id',
        'polhut',
        'ppns',
        'tphl',
        'mmp',
        'keterangan',
    ];
}
