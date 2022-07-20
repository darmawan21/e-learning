<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'nama_kelas' => 'Kelas I A',
            'tahun_ajaran' => '2018/2019'
        ]);

        Kelas::create([
            'nama_kelas' => 'Kelas II A',
            'tahun_ajaran' => '2018/2019'
        ]);
        
        Kelas::create([
            'nama_kelas' => 'Kelas III A',
            'tahun_ajaran' => '2018/2019'
        ]);
    }
}
