<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru_tatib extends Model
{
    use HasFactory;

    public function gurus()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
