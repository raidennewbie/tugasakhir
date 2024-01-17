<?php

namespace Database\Seeders;

use App\Models\jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        jadwal::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
            'kelas_id' => 2,
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'hari' => 'senin',
            'jam_masuk' => '07:30:00',  
            'jam_selesai' => '08:45:00',  
        ]);

        jadwal::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
            'kelas_id' => 2,
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'hari' => 'selasa',
            'jam_masuk' => '07:30:00',  
            'jam_selesai' => '08:45:00',  
        ]);
    }
}
