<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelasMapel()
    {
        return $this->belongsTo(KelasMapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelasTugas()
    {
        return $this->hasMany(KelasTugas::class);
    }

    public function tugasSiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
