<?php

namespace Database\Seeders;

use App\Models\angkatan;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        angkatan::create([
            'name' => '2011',
            'slug' => '2011',
        ]);
        angkatan::create([
            'name' => '2012',
            'slug' => '2012',
        ]);
        angkatan::create([
            'name' => '2013',
            'slug' => '2013',
        ]);
        angkatan::create([
            'name' => '2014',
            'slug' => '2014',
        ]);
        angkatan::create([
            'name' => '2015',
            'slug' => '2015',
        ]);
        angkatan::create([
            'name' => '2016',
            'slug' => '2016',
        ]);

        angkatan::create([
            'name' => '2017',
            'slug' => '2017',
        ]);
     
        angkatan::create([
            'name' => '2018',
            'slug' => '2018',
        ]);
        angkatan::create([
            'name' => '2019',
            'slug' => '2019',
        ]);
        angkatan::create([
            'name' => '2020',
            'slug' => '2020',
        ]);
        angkatan::create([
            'name' => '2021',
            'slug' => '2021',
        ]);
        angkatan::create([
            'name' => '2022',
            'slug' => '2023',
        ]);
        angkatan::create([
            'name' => '2024',
            'slug' => '2024',
        ]);

        angkatan::create([
            'name' => '2025',
            'slug' => '2025',
        ]);
    }
}
