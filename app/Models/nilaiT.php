<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilaiT extends Model
{
    use HasFactory;

    protected $table = 'nilaiTugas';

    protected $guarded = [];

    public function siswas()
    {
        return $this->belongsTo(siswas::class, 'siswa_id');
    }

    public function mapels()
    {
        return $this->belongsTo(mapels::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
}
