<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function kelasMapel()
    {
        return $this->hasMany(KelasMapel::class);
    }
}
