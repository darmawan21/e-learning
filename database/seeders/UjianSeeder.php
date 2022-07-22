<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ujian::create([
            'judul' => 'Aljabar',
            'tanggal' => date('Y-m-d'),
            'status' => 'draft',
            'guru_id' => '1',
            'kelas_mapel_id' => '1',
            'jenis_ujian_id' => '2',
        ]);
    }
}
