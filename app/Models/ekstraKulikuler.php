<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekstraKulikuler extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gurus()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
