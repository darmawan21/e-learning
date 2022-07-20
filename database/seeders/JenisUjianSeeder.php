<?php

namespace Database\Seeders;

use App\Models\JenisUjian;
use Illuminate\Database\Seeder;

class JenisUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisUjian::create([
            'jenis_ujian' => 'Kuis',
        ]);

        JenisUjian::create([
            'jenis_ujian' => 'UTS',
        ]);

        JenisUjian::create([
            'jenis_ujian' => 'UAS',
        ]);
    }
}
