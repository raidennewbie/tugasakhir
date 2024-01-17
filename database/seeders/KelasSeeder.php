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
        // Kelas::create([
        //     'name' => 'X 1',
        // ]);

        // Kelas::create([
        //     'name' => 'X 2',
        // ]);

        // Kelas::create([
        //     'name' => 'X 3',
        // ]);

        // Kelas::create([
        //     'name' => 'X 4',
        // ]);

        // Kelas::create([
        //     'name' => 'XI AGAMA',
        // ]);

        Kelas::create([
            'name' => 'XI MIA',
        ]);

        Kelas::create([
            'name' => 'XI IIS 1',
        ]);

        // Kelas::create([
        //     'name' => 'XI IIS 2',
        // ]);

        // Kelas::create([
        //     'name' => 'XII AGAMA 1',
        // ]);

        // Kelas::create([
        //     'name' => 'XII AGAMA 2',
        // ]);

        // Kelas::create([
        //     'name' => 'XII MIA',
        // ]);

        // Kelas::create([
        //     'name' => 'XII IIS 1',
        // ]);

        // Kelas::create([
        //     'name' => 'XII IIS 2',
        // ]);
    }
}
