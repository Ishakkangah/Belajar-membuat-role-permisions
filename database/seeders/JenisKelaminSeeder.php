<?php

namespace Database\Seeders;

use App\Models\jenis_kelamin;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jenis_kelamin::create([
            'jenis_kelamin' => 'laki-laki',
            'slug' => 'laki-laki',
        ]);

        jenis_kelamin::create([
            'jenis_kelamin' => 'perempuan',
            'slug' => 'perempuan',
        ]);
    }
}
