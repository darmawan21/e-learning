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
}
