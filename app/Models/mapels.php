<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapels extends Model
{
    use HasFactory;

    public function tugass()
    {
        return $this->hasMany(nilaiT::class, 'mapel_id');
    }

    public function uhs()
    {
        return $this->hasMany(NilaiUh::class, 'mapel_id');
    }

    public function kehadirans()
    {
        return $this->hasMany(kehadiran::class, 'mapel_id');
    }
}
