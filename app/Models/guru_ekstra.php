<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru_ekstra extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gurus()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function ekstras()
    {
        return $this->belongsTo(ekstraKulikuler::class, 'ekstra_id');
    }
}
