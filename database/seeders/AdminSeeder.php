<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'tanggal_lahir' => '1991-05-02',
            'alamat' => 'Solo',
            'pangkat' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
