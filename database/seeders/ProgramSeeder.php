<?php

namespace Database\Seeders;

use App\Models\program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        program::create([
            'name' => 'Sistem informatika',
            'slug' => 'Sistem informatika',
            'kurikulum_id' => '1',
            'status_id' => '1',
        ]);
        program::create([
            'name' => 'Teknik informatika',
            'slug' => 'Teknik informatika',
            'kurikulum_id' => '1',
            'status_id' => '2',
        ]);
        program::create([
            'name' => 'Psikologi',
            'slug' => 'Psikologi',
            'kurikulum_id' => '2',
            'status_id' => '3',
        ]);
        program::create([
            'name' => 'Bahasa asing',
            'slug' => 'Bahasa asing',
            'kurikulum_id' => '3',
            'status_id' => '3',
        ]);
    }
}
