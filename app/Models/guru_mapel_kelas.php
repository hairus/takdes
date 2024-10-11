<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru_mapel_kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function mapels()
    {
        return $this->belongsTo(mapels::class, 'mapel_id');
    }

    public function gurus()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function tas()
    {
        return $this->belongsTo(tas::class, 'ta_id');
    }
}
