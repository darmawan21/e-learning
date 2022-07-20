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
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
