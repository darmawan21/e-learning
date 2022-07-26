<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nis',
        'name',
        'kelamin',
        'alamat',
        'image',
        'telp',
        'tanggal_lahir',
        'tempat_lahir',
        'wali',
        'kelas_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function tugasSiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
