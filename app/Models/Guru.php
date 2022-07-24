<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'guru'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip',
        'name',
        'kelamin',
        'image',
        'agama',
        'alamat',
        'telp',
        'tanggal_lahir',
        'tempat_lahir',
        'pangkat',
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

    public function kelasMapel()
    {
        return $this->hasMany(KelasMapel::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function pengumumanGuru()
    {
        return $this->hasMany(PengumumanGuru::class);
    }
}
