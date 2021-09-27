<?php

namespace Database\Seeders;

use App\Models\agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        agama::create([
            'name' => 'Islam',
            'slug' => 'Islam',
        ]);

        agama::create([
            'name' => 'Kristen Khatolik',
            'slug' => 'Kristen Khatolik',
        ]);

        agama::create([
            'name' => 'Kristen Protestan ',
            'slug' => 'Kristen Protestan ',
        ]);
        agama::create([
            'name' => 'Hindu',
            'slug' => 'Hindu',
        ]);

        agama::create([
            'name' => 'Budha',
            'slug' => 'Budha',
        ]);
        agama::create([
            'name' => 'Kong hu',
            'slug' => 'Kong hu',
        ]);
    }
}
