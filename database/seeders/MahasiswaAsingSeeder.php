<?php

namespace Database\Seeders;

use App\Models\mahasiswa_asing;
use Illuminate\Database\Seeder;

class MahasiswaAsingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mahasiswa_asing::create([
            'paspor_tipe' => '',
            'paspor_kode' => '021 000',
            'paspor_nomor' => '212',
            'visa_tipe' => '2222',
            'visa_indeks' => '1212',
            'expired_date' => '',
        ]);
    
        mahasiswa_asing::create([
            'paspor_tipe' => '',
            'paspor_kode' => '021 000',
            'paspor_nomor' => '212',
            'visa_tipe' => '2222',
            'visa_indeks' => '1212',
            'expired_date' => '',
        ]);
    }
}
