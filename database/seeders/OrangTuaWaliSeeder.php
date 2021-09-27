<?php

namespace Database\Seeders;

use App\Models\orang_tua_wali;
use Illuminate\Database\Seeder;

class OrangTuaWaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        orang_tua_wali::create([
            'slug' => 'syamsudin',
            'nama_ayah_wali' => 'syamsudin',
            'ktp_ayah' => '181911000010101',
            'perkerjaan_ayah' => 'Programmer',
            'nip_ayah' => '1234567890123456',
            'pangkat_ayah' => 'direktur',
            'nama_instansi_ayah' => 'vittindo',
            'alamat_instansi_ayah' => 'Jl.kemuning 999, palembang',
            'nama_ibu' => 'juai riah',
            'ktp_ibu' => '1234567890123456',
            'perkerjaan_ibu' => 'Irt',
        ]);
 
        orang_tua_wali::create([
            'slug' => 'alamiyah_ismail',
            'nama_ayah_wali' => 'alamiyah ismail',
            'ktp_ayah' => '181911000010101',
            'perkerjaan_ayah' => 'IT Support',
            'nip_ayah' => '1234567890123456',
            'pangkat_ayah' => 'direktur',
            'nama_instansi_ayah' => 'vittindo',
            'alamat_instansi_ayah' => 'Jl.kapten panjaitan 899, palembang',
            'nama_ibu' => 'sulistinem aini',
            'ktp_ibu' => '1234567890123456',
            'perkerjaan_ibu' => 'PNS',
        ]);
    }
}
