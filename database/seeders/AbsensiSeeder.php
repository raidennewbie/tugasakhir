<?php

namespace Database\Seeders;

use App\Models\absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        absensi::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
            
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 6,
            'status' => 'hadir',
            'jadwal_id' => '1',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 7,
            'status' => 'hadir',
            'jadwal_id' => '1',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 8,
            'status' => 'hadir',
            'jadwal_id' => '1',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 9,
            'status' => 'izin',
            'jadwal_id' => '1',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '5',
            'kelas_id' => 2,
            'mapel_id' => 4,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 10,
            'status' => 'izin',
            'jadwal_id' => '1',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        //

        absensi::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 6,
            'status' => 'izin',
            'jadwal_id' => '2',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 7,
            'status' => 'izin',
            'jadwal_id' => '2',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 8,
            'status' => 'hadir',
            'jadwal_id' => '2',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 9,
            'status' => 'hadir',
            'jadwal_id' => '2',
            'created_at' => '2024-01-14 00:00:00',
        ]);

        absensi::create([
            'user_id' => '6',
            'kelas_id' => 2,
            'mapel_id' => 6,
          
            'semester_id' => 1,
            'tahunajar_id' => '1',
            'siswa_id' => 10,
            'status' => 'hadir',
            'jadwal_id' => '2',
            'created_at' => '2024-01-14 00:00:00',
        ]);

    }
}
