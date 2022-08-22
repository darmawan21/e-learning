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
            'name' => 'DANIEL APRIANSYAH',
            'nis' => '0082094344',
            'kelamin' => 'Laki-laki',
            'alamat' => 'SUKAMAKMUR',
            'telp' => '085543895490',
            'tempat_lahir' => 'KARYA USAHA',
            'tanggal_lahir' => '2008-04-24',
            'wali' => 'ABDUL TUKIRAN',
            'email' => 'daniel@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '1',
        ]);

        User::create([
            'name' => 'AULYAH SARI',
            'nis' => '0084959299',
            'kelamin' => 'Perempuan',
            'alamat' => 'KARYA USAHA',
            'telp' => '083122887690',
            'tempat_lahir' => 'KARYA USAHA',
            'tanggal_lahir' => '2008-01-14',
            'wali' => 'TRI PRAYITNO',
            'email' => 'aulyah@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '1',
        ]);

        User::create([
            'name' => 'AYU SAPUTRI',
            'nis' => '0077431355',
            'kelamin' => 'Perempuan',
            'alamat' => 'GADING SARI',
            'telp' => '085543895490',
            'tempat_lahir' => 'KARYA USAHA',
            'tanggal_lahir' => '2007-06-05',
            'wali' => 'EDI SUJARWO',
            'email' => 'ayu@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '2',
        ]);

        User::create([
            'name' => 'DEA INTAN SARI',
            'nis' => '0066142040',
            'kelamin' => 'Perempuan',
            'alamat' => 'GADING SARI',
            'telp' => '085789004522',
            'tempat_lahir' => 'KARYA USAHA, OKI',
            'tanggal_lahir' => '2007-01-09',
            'wali' => 'WITOYO',
            'email' => 'deaintan@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '2',
        ]);

        User::create([
            'name' => 'BAGAS ARIADI PRATAMA',
            'nis' => '0068295662',
            'kelamin' => 'Laki-laki',
            'alamat' => 'GADING SARI',
            'telp' => '089677552309',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2006-05-24',
            'wali' => 'SUPRIADI',
            'email' => 'bagusariadi@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '3',
        ]);

        User::create([
            'name' => 'BENI RAFEL',
            'nis' => '0057079516',
            'kelamin' => 'Laki-laki',
            'alamat' => 'GADING SARI',
            'telp' => '081378095643',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2006-10-23',
            'wali' => 'INDRA',
            'email' => 'beni@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '3',
        ]);

        User::create([
            'name' => 'DAVID DESTIANDI AFRIKA',
            'nis' => '0094111975',
            'kelamin' => 'Laki-laki',
            'alamat' => 'KARYA USAHA',
            'telp' => '089677552309',
            'tempat_lahir' => 'OKI',
            'tanggal_lahir' => '2009-10-08',
            'wali' => 'YOSEP',
            'email' => 'david@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '4',
        ]);

        User::create([
            'name' => 'CHACHA CINDORA',
            'nis' => '0098599840',
            'kelamin' => 'Perempuan',
            'alamat' => 'KARYA USAHA',
            'telp' => '083122887690',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2009-06-20',
            'wali' => 'ANDRI SUDARMAN',
            'email' => 'chacha@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '4',
        ]);

        User::create([
            'name' => 'BELA NOVITA SARI',
            'nis' => '08310089509',
            'kelamin' => 'Perempuan',
            'alamat' => 'RAMAN JAYA',
            'telp' => '085543895490',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2007-11-23',
            'wali' => 'RUSLI',
            'email' => 'bela@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '5',
        ]);

        User::create([
            'name' => 'TATA LASMANA',
            'nis' => '0073223100',
            'kelamin' => 'Perempuan',
            'alamat' => 'PEMATANG SUKARAMAH',
            'telp' => '083122887690',
            'tempat_lahir' => 'PEMATANG SUKARAMAH',
            'tanggal_lahir' => '2007-01-03',
            'wali' => 'UTO RAHMAN',
            'email' => 'tata@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '5',
        ]);

        User::create([
            'name' => 'BAGUS ARIF SETIAJI',
            'nis' => '0065010259',
            'kelamin' => 'Laki-laki',
            'alamat' => 'SUKAMAKMUR',
            'telp' => '085789004522',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2006-09-16',
            'wali' => 'BADARUDIN MUNIR',
            'email' => 'bagusarif@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '6',
        ]);

        User::create([
            'name' => 'WINDA ADELIA',
            'nis' => '0079949550',
            'kelamin' => 'Perempuan',
            'alamat' => 'GADING SARI',
            'telp' => '085543895490',
            'tempat_lahir' => 'GADING SARI',
            'tanggal_lahir' => '2007-06-15',
            'wali' => 'ROHMAT',
            'email' => 'winda@gmail.com',
            'password' => bcrypt('password'),
            'kelas_id' => '6',
        ]);
    }
}
