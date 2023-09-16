<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembinaanUsaha1 extends Model
{
    use HasFactory;
    protected $table = 'pembinaan_usahas_1';

    // Define kolom-kolom yang digunakan dalam triwulan 1
    protected $fillable = [
        'no_register_kawasan',
        'nama_kelompok',
        'anggota',
        'jenis_kegiatan',
        'jumlah_dana',
        'sumber_dana',
        'hasil_manfaat',
        'pendamping',
        'keterangan',
    ];
    public function pembinaanUsaha()
    {
        return $this->morphOne(PembinaanUsaha::class, 'pembinaan');
    }
}
