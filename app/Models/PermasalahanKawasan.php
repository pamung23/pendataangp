<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermasalahanKawasan extends Model
{
    use HasFactory;
    protected $table = 'permasalahan_kawasans'; // Ganti 'nama_tabel_permasalahan_kawasan' dengan nama tabel yang sesuai

    protected $guarded = [];
    public function permasalahan()
    {
        return $this->morphTo();
    }
}
