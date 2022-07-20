<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    public function myJawab()
    {
        return $this->hasOne(Jawaban::class)->where('user_id', auth()->user()->id);
    }
}
