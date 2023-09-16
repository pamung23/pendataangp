<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananPerkara extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'penanganan_perkara';
    public function penanganan()
    {
        return $this->morphTo();
    }
}
