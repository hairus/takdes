<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilaiEsktras extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswas()
    {
        return $this->belongsTo(siswas::class, 'siswa_id');
    }

    public function ekstras()
    {
        return $this->belongsTo(ekstraKulikuler::class, 'ekstra_id');
    }
}
