<?php

namespace Database\Seeders;

use App\Models\asal_sekolah;
use Illuminate\Database\Seeder;

class AsalSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        asal_sekolah::create([
            'asal_sekolah' => 'SMK 897 Bandung selatan',
            'alamat_sekolah' => 'Jl.Kayubesi No.99 Bandung selatan',
            'negara' => 'Indonesia',
            'jurusan' => 'Akuntansi',
            'nomor_ijazah_sma' => '12345',
        ]);
     
        asal_sekolah::create([
            'asal_sekolah' => 'SMK 811 Jakarta Cikarang',
            'alamat_sekolah' => 'Jl.Maju munder No.190 Pelabuhan ratu pengandaran',
            'negara' => 'Indonesia',
            'jurusan' => 'Geofisika',
            'nomor_ijazah_sma' => '12345',
        ]);
    }
}
