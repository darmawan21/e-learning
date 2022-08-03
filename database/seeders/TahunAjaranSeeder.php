<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::create([
            'tahun_ajaran' => '2020 / 2021',
        ]);

        TahunAjaran::create([
            'tahun_ajaran' => '2021 / 2022',
        ]);

        TahunAjaran::create([
            'tahun_ajaran' => '2022 / 2023',
        ]);
    }
}
