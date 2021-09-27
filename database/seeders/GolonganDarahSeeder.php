<?php

namespace Database\Seeders;

use App\Models\golongan_darah;
use Illuminate\Database\Seeder;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        golongan_darah::create(['name' => 'A',
        'slug' => 'A'
        ]);
        golongan_darah::create(['name' => 'AB',
                'slug' => 'AB',
        ]);
        golongan_darah::create(['name' => 'B',
                'slug' => 'B'
        ]);
        golongan_darah::create(['name' => 'O',
                'slug' => 'O',
        ]);
    }
}
