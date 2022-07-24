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
        ]);

        Kelas::create([
            'nama_kelas' => 'Kelas II A',
        ]);
        
        Kelas::create([
            'nama_kelas' => 'Kelas III A',
        ]);
    }
}
