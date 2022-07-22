<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenisUjian()
    {
        return $this->belongsTo(JenisUjian::class);
    }

    public function kelasMapel()
    {
        return $this->belongsTo(KelasMapel::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function myNilai()
    {
        return $this->hasOne(Nilai::class)->where('user_id', auth()->user()->id);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function topTen()
    {
        return $this->nilai()->orderByDesc('point')->take(10);
    }

    public function kelasUjian()
    {
        return $this->hasMany(KelasUjian::class);
    }
}
