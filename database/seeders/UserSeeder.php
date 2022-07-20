<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '2',
        ]);

        User::create([
            'name' => 'siswa2',
            'email' => 'siswa2@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '3',
        ]);
    }
}
