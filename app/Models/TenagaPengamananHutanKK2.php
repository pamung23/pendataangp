<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPengamananHutanKK2 extends Model
{
    use HasFactory;
    protected $table = 'tenaga_pengamanan_hutan_kk1'; // Nama tabel sesuai dengan nama tabel di database
    protected $fillable = [
        'no_register_kawasan',
        'polhut',
        'ppns',
        'tphl',
        'mmp',
        'keterangan',
    ];
}
