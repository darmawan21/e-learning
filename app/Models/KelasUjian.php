<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasUjian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function myUjian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
