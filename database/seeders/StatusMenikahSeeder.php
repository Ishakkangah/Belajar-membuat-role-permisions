<?php

namespace Database\Seeders;

use App\Models\status_menikah;
use Illuminate\Database\Seeder;

class StatusMenikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        status_menikah::create([
            'name' => 'menikah',
            'slug' => 'menikah',
        ]);

        status_menikah::create([
            'name' => 'belum menikah',
            'slug' => 'belum menikah',
        ]);
    }
}
