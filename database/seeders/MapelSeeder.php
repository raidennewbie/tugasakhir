<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'name' => 'FISIKA',
        ]);

        Mapel::create([
            'name' => 'MATEMATIKA',
        ]);

        Mapel::create([ 
            'name' => 'BIOLOGI',
        ]);

        Mapel::create([
            'name' => 'SOSIOLOGI',
        ]);

        Mapel::create([
            'name' => 'AKIDAH AKHLAK',
        ]);

        Mapel::create([
            'name' => 'BAHASA INDONESIA',
        ]);

        Mapel::create([
            'name' => 'BAHASA INGGRIS',
        ]);

        Mapel::create([
            'name' => 'KIMIA',
        ]);

        Mapel::create([
            'name' => 'AL-QURAN HADIS',
        ]);

        Mapel::create([
            'name' => 'GEOGRAFI',
        ]);

        Mapel::create([
            'name' => 'EKONOMI',
        ]);

        Mapel::create([
            'name' => 'BAHASA ARAB',
        ]);

        Mapel::create([
            'name' => 'PENJASORKES',
        ]);

        Mapel::create([
            'name' => 'SEJARAH',
        ]);
    }
}
