<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;  // Ensure you are importing the correct model

class UniversitiesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\University::create([
            'name' => 'NWU',
        ]);
        
        \App\Models\University::create([
            'name' => 'Khulna University',
        ]);
        \App\Models\University::create([
            'name' => 'NUBTK ',
        ]);
    }
}
