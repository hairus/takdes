<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_tatib extends Model
{
    use HasFactory;

    public function siswas()
    {
        return $this->belongsTo(siswas::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
}
