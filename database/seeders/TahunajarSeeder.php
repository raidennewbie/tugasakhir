<?php

namespace Database\Seeders;

use App\Models\Tahunajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tahunajar::create([
        //     'tahun_ajaran' => '2022/2023',
        // ]);

        Tahunajar::create([
            'tahun_ajaran' => '2023/2024',
        ]);

        Tahunajar::create([
            'tahun_ajaran' => '2024/2025',
        ]);
    }
}
