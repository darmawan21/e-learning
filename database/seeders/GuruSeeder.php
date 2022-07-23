<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'name' => 'Sumanto',
            'nip' => '180101553',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Palembang',
            'agama' => 'islam',
            'telp' => '082134600995',
            'tempat_lahir' => 'Bekasi',
            'tanggal_lahir' => '1991-05-02',
            'pangkat' => 'Guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
