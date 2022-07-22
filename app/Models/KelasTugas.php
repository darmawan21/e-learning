<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasTugas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
