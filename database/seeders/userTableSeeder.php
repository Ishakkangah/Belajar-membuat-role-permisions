<?php

namespace Database\Seeders;

use App\Models\dosen_wali;
use App\Models\jenis_kelamin;
use App\Models\User;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Super_Admin = User::create([
            'name' => 'Ishakk angah',
            'email' => 'ishak@gmail.com',
            'nrp' => '1911000',
            'thumbnail' => 'profile.png',
            'dosen_wali_id' => '1',
            'tanggal_lahir' => '1999/02/02',
            'tempat_lahir' => 'Palembang',
            'golongan_darah_id' => rand(1,4),
            'jenis_kelamin_id' => rand(1,2),
            'agama_id' => 'Islam',
            'status_menikah_id' => '1',
            'no_hp' => '08950001299',
            'ktp' => '1602321122335127',
            'orang_tua_wali_id' => '1',
            'program_id' => '1',
            'angkatan_id' => '1',
            'asal_sekolah_id' => '1',
            'alamat_id' => '1',
            'mahasiswa_asing_id' => '1',
            'password' => bcrypt('password'),
        ]);
        $Super_Admin->assignRole('super admin');



        
        $Admin = User::create([
            'name' => 'Naysilla mirdad',
            'email' => 'admin@gmail.test',
            'nrp' => '1911001',
            'thumbnail' => 'profile.png',
            'dosen_wali_id' => '1',
            'tanggal_lahir' => '1999/02/02',
            'tempat_lahir' => 'Bandung',
            'golongan_darah_id' => rand(1,4),
            'jenis_kelamin_id' => rand(1,2),
            'agama_id' => 'Islam',
            'status_menikah_id' => '1',
            'no_hp' => '08950001280',
            'ktp' => '1602321122335222',
            'orang_tua_wali_id' => '2',
            'program_id' => '2', 
            'angkatan_id' => '2', 
            'asal_sekolah_id' => '2', 
            'alamat_id' => '2', 
            'mahasiswa_asing_id' => '2', 
            'password' => bcrypt('password'),
        ]);
        $Admin->assignRole('admin');
        
        
        $user = User::create([
            'name' => 'Sundari sukmana',
            'email' => 'user@gmail.test',
            'nrp' => '1911004',
            'thumbnail' => 'profile.png',
            'dosen_wali_id' => '1',
            'tanggal_lahir' => '1999/02/02',
            'tempat_lahir' => 'Depol',
            'golongan_darah_id' => rand(1,4),
            'jenis_kelamin_id' => rand(1,2),
            'agama_id' => 'Islam',
            'status_menikah_id' => '1',
            'no_hp' => '08950001281',
            'ktp' => '1602321122335122',
            'orang_tua_wali_id' => '2',
            'program_id' => '2', 
            'angkatan_id' => '2', 
            'asal_sekolah_id' => '2', 
            'alamat_id' => '2', 
            'mahasiswa_asing_id' => '2', 
            'password' => bcrypt('password'),
        ]);
         $user->assignRole('user');


        $Dosen = User::create([
             'name' => 'Nikita willy',
            'email' => 'dosen@gmail.test',
            'nrp' => '1911003',
            'thumbnail' => 'profile.png',
            'dosen_wali_id' => '1',
            'tanggal_lahir' => '1999/02/02',
            'tempat_lahir' => 'Depol',
            'golongan_darah_id' => rand(1,4),
            'jenis_kelamin_id' => rand(1,2),
            'agama_id' => 'Islam',
            'status_menikah_id' => '1',
            'no_hp' => '08950001280',
            'ktp' => '1602321122335122',
            'orang_tua_wali_id' => '2',
            'program_id' => '2', 
            'angkatan_id' => '2', 
            'asal_sekolah_id' => '2', 
            'alamat_id' => '2', 
            'mahasiswa_asing_id' => '2', 
            'password' => bcrypt('password'),
        ]);
        $Dosen->assignRole('dosen');
        dosen_wali::create([
            'name' => $Dosen['name'],
            'slug' => \Str::slug($Dosen['name']),
        ]);

    }
}
