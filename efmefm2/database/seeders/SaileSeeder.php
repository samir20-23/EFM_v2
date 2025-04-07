<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saile;

class SaileSeeder extends Seeder
{
    public function run()
    {
        Saile::create(['name' => 'Warehouse 1', 'espace' => 200]);
        Saile::create(['name' => 'Warehouse 2', 'espace' => 350]);
    }
}