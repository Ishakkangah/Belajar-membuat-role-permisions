<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        status::create([
            'name' => 'A',
            'slug' => 'A',
        ]);
        status::create([
            'name' => 'B',
            'slug' => 'B',
        ]);
        status::create([
            'name' => 'C',
            'slug' => 'C',
        ]);
        
    }
}
