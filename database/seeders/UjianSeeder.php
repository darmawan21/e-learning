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
            'acak' => 'acak',
            'status' => 'draft',
            'guru_id' => '1',
            'mata_pelajaran_id' => '1',
            'jenis_ujian_id' => '2',
        ]);
    }
}
