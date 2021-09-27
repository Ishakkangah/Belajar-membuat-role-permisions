<?php

namespace Database\Seeders;

use App\Models\alamat;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        alamat::create([
            'alamat_rumah' => 'Jl.Petanian Pekanbaru',
            'kota' => 'Pekanbaru',
            'provinsi' => 'riau sumatra',
            'kode_pos' => '0002121',
            'telepon_rumah' => '021 999 233',
        ]);
    
        alamat::create([
            'alamat_rumah' => 'Jl.Agung Banda aceh',
            'kota' => 'Banda aceh',
            'provinsi' => 'Nanggroe Aceh Darussalam',
            'kode_pos' => '0002221',
            'telepon_rumah' => '021 779 288',
        ]);
    }
}
