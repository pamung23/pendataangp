<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermasalahanKawasan2 extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'permasalahan_kawasan2'; // Ganti 'nama_tabel_permasalahan_kawasan' dengan nama tabel yang sesuai

    protected $fillable = [
        'no_register_kawasan',
        'jenis_permasalahan',
        'uraian_permasalahan',
        'progres_penyelesaian',
        'keterangan',
        // Tambahkan kolom lain sesuai kebutuhan
    ];
    public function PermasalahanKawasan()
    {
        return $this->morphOne(PermasalahanKawasan::class, 'pembinaan');
    }
}
