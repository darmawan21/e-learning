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
            'name' => 'I GEDE TARUKAN D, S.PD, M.SI',
            'nip' => '197106041995121001',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Gading sari',
            'agama' => 'islam',
            'telp' => '083123557689',
            'tempat_lahir' => 'Warnasari',
            'tanggal_lahir' => '1971-06-04',
            'pangkat' => 'Kepala sekolah',
            'email' => 'gedetarukan@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'KUSWANTORO',
            'nip' => '196302041986011003',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Catur tunggal',
            'agama' => 'islam',
            'telp' => '089776765456',
            'tempat_lahir' => 'Gunungkidul',
            'tanggal_lahir' => '1963-02-04',
            'pangkat' => 'Guru',
            'email' => 'kuswantoro@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        Guru::create([
            'name' => 'DIAN SUSILAWATI, S.PD',
            'nip' => '198703102009032000',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Catur tunggal',
            'agama' => 'islam',
            'telp' => '081324556766',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '1987-03-10',
            'pangkat' => 'Wakil kepala',
            'email' => 'dian@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'YOYOK SUWARDOYO, S.PD',
            'nip' => '198701042010011003',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Sumber mulya',
            'agama' => 'islam',
            'telp' => '08125577768',
            'tempat_lahir' => 'Purwodadi',
            'tanggal_lahir' => '1987-01-04',
            'pangkat' => 'Guru',
            'email' => 'yoyok@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'MADE JANTEN, S.E',
            'nip' => '196911162014061001',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Mukti karya',
            'agama' => 'islam',
            'telp' => '08122366897',
            'tempat_lahir' => 'Nusaraya, Oku',
            'tanggal_lahir' => '1969-11-16',
            'pangkat' => 'Guru',
            'email' => 'madejanten@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'TANSISTA, A.MD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Sumber mulya',
            'agama' => 'islam',
            'telp' => '0857678809',
            'tempat_lahir' => 'Siring Agung',
            'tanggal_lahir' => '1975-08-15',
            'pangkat' => 'Guru',
            'email' => 'tansista@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'MUSLIMAH, S.I.P.',
            'nip' => '197104122022212002',
            'kelamin' => 'Perempuan',
            'alamat' => 'Cahaya mulya',
            'agama' => 'islam',
            'telp' => '0811456663390',
            'tempat_lahir' => 'Sukoharjo',
            'tanggal_lahir' => '1971-04-12',
            'pangkat' => 'Guru',
            'email' => 'muslimah@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'AGUS SALIM, S.PD I',
            'nip' => '180101553',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Gading sari',
            'agama' => 'islam',
            'telp' => '09966456600',
            'tempat_lahir' => 'Gunungkidul',
            'tanggal_lahir' => '1991-08-17',
            'pangkat' => 'Guru',
            'email' => 'agus@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'LULUS RIRIN LESTARI, S.PD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Gadingsari',
            'agama' => 'islam',
            'telp' => '089776765456',
            'tempat_lahir' => 'Gunungkidul',
            'tanggal_lahir' => '1995-07-30',
            'pangkat' => 'Guru',
            'email' => 'lulus@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'JAIMAH, S.PD',
            'nip' => '180101553',
            'kelamin' => 'Perempuan',
            'alamat' => 'Cahaya mulya',
            'agama' => 'islam',
            'telp' => '081324556766',
            'tempat_lahir' => 'Karya Usaha',
            'tanggal_lahir' => '1990-10-13',
            'pangkat' => 'Guru',
            'email' => 'jaimah@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'KHUSNUL KHOTIMAH, S.PD',
            'nip' => '199012232022212008',
            'kelamin' => 'Perempuan',
            'alamat' => 'Sumber mulya',
            'agama' => 'islam',
            'telp' => '08125577768',
            'tempat_lahir' => 'Cahya Bumi',
            'tanggal_lahir' => '1993-12-28',
            'pangkat' => 'Guru',
            'email' => 'khusnul@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'SITI ROIKHATUL JANNAH, S.PD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Mukti karya',
            'agama' => 'islam',
            'telp' => '08122366897',
            'tempat_lahir' => 'Gading Sari',
            'tanggal_lahir' => '1995-08-04',
            'pangkat' => 'Guru',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'DIAN EKO WAHONO, S.KOM',
            'nip' => '199107292022211005',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Catur tunggal',
            'agama' => 'islam',
            'telp' => '0857678809',
            'tempat_lahir' => 'Pematang Jaya',
            'tanggal_lahir' => '1991-07-29',
            'pangkat' => 'Guru',
            'email' => 'dianeko@gmail.com',
            'password' => bcrypt('password')  
        ]);

        Guru::create([
            'name' => 'RINDI ANTIKA, S.PD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Catur tunggal',
            'agama' => 'islam',
            'telp' => '0811456663390',
            'tempat_lahir' => 'Gading Sari',
            'tanggal_lahir' => '1998-12-11',
            'pangkat' => 'Guru',
            'email' => 'rindi@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'ERFI WIDAYANTI, S.PD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Mukti karya',
            'agama' => 'islam',
            'telp' => '09966456600',
            'tempat_lahir' => 'Gading Sari',
            'tanggal_lahir' => '1998-05-06',
            'pangkat' => 'Guru',
            'email' => 'erfi@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'AERI RESTIHAUINGRUM,S.PD',
            'kelamin' => 'Perempuan',
            'alamat' => 'Gading sari',
            'agama' => 'islam',
            'telp' => '089776765456',
            'tempat_lahir' => 'Sidogede',
            'tanggal_lahir' => '1991-07-27',
            'pangkat' => 'Guru',
            'email' => 'aeri@gmail.com',
            'password' => bcrypt('password')
        ]);

        Guru::create([
            'name' => 'ALI AKBAR',
            'kelamin' => 'Laki-laki',
            'alamat' => 'gadingsari',
            'agama' => 'islam',
            'telp' => '081324556766',
            'tempat_lahir' => 'Tanjung Kemuning',
            'tanggal_lahir' => '1996-04-02',
            'pangkat' => 'Guru',
            'email' => 'aliakbar@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
