<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'siswa',
            'nis' => '180101133',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Solo',
            'telp' => '082134600995',
            'tempat_lahir' => 'Wonogiri',
            'tanggal_lahir' => '2000-11-03',
            'wali' => 'bapak',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '2',
        ]);

        User::create([
            'name' => 'siswa2',
            'nis' => '180101117',
            'kelamin' => 'Perempuan',
            'alamat' => 'Solo',
            'telp' => '082134600999',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2001-01-07',
            'wali' => 'bapak',
            'email' => 'siswa2@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '3',
        ]);
    }
}
