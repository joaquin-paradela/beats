<?php

namespace Database\Seeders;

use App\Models\Beat;
use Illuminate\Database\Seeder;

class BeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beat::create([
            'name' => 'Dark Night',
            'genre' => 'Trap',
            'bpm' => 140,
            'price' => 25.00,
            'active' => true,
        ]);

        Beat::create([
            'name' => 'Cold Streets',
            'genre' => 'Drill',
            'bpm' => 150,
            'price' => 30.00,
            'active' => true,
        ]);

        Beat::create([
            'name' => 'Golden Era',
            'genre' => 'Boom Bap',
            'bpm' => 90,
            'price' => 20.00,
            'active' => true,
        ]);
    }
}
