<?php

namespace Database\Seeders;

use App\Models\asal_sekolah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(permissionTableSeeder::class);
        $this->call(rolesTableSeeder::class);
        $this->call(DosenWaliSeeder::class);
        $this->call(GolonganDarahSeeder::class);
        $this->call(JenisKelaminSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(StatusMenikahSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(AngkatanSeeder::class);
        $this->call(KurikulumSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(OrangTuaWaliSeeder::class);
        $this->call(AsalSekolahSeeder::class);
        $this->call(AlamatSeeder::class);
        $this->call(MahasiswaAsingSeeder::class);
        $this->call(userTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
