<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelasUjian()
    {
        return $this->hasMany(KelasUjian::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function kelasMapel()
    {
        return $this->hasMany(KelasMapel::class);
    }

    public function kelasTugas()
    {
        return $this->hasMany(KelasTugas::class);
    }

    public function pengumumanGuru()
    {
        return $this->hasMany(PengumumanGuruan::class);
    }

    public function pengumumanAdmin()
    {
        return $this->hasMany(PengumumanAdmin::class);
    }
}
