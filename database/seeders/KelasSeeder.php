<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'name' => 'X IPA',
        ]);
        Kelas::create([
            'name' => 'XI IPS',
        ]);
        Kelas::create([
            'name' => 'XII IPS',
        ]);
        Kelas::create([
            'name' => 'XI IPA',
        ]);
    }
}
