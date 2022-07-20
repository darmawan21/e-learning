<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MataPelajaran::create([
            'nama_mapel' => 'MATEMATIKA',
        ]);

        MataPelajaran::create([
            'nama_mapel' => 'BAHASA INDONESIA',
        ]);

        MataPelajaran::create([
            'nama_mapel' => 'BAHASA INGGRIS',
        ]);

        MataPelajaran::create([
            'nama_mapel' => 'GEOGRAFI',
        ]);
    }
}
