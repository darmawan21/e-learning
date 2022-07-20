<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUjian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
