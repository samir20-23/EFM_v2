<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Natuve;

class NatuveSeeder extends Seeder
{
    public function run()
    {
        Natuve::create(['name' => 'Organic']);
        Natuve::create(['name' => 'Synthetic']);
    }
}