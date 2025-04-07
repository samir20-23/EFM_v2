<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class livreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('livres')->insert([
            [
                'titre' => 'book of horrors',
                'auteur' => 'ReedRazor.',
                'nombre_pages' => 5,
                'categorie' => 'horror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'book of horrors 2',
                'auteur' => 'ReedRazor.',
                'nombre_pages' => 15,
                'categorie' => 'horror',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
