<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::create([
            'soal' => '1+1..?',
            'pilihan1' => '18',
            'pilihan2' => '20',
            'pilihan3' => '11',
            'pilihan4' => '2',
            'kunci' => '4',
            'ujian_id' => '1',
        ]);

        Soal::create([
            'soal' => '4x4..?',
            'pilihan1' => '18',
            'pilihan2' => '20',
            'pilihan3' => '11',
            'pilihan4' => '8',
            'kunci' => '2',
            'ujian_id' => '1',
        ]);

        Soal::create([
            'soal' => '5x5..?',
            'pilihan1' => '15',
            'pilihan2' => '20',
            'pilihan3' => '25',
            'pilihan4' => '3',
            'kunci' => '3',
            'ujian_id' => '2',
        ]);
    }
}
